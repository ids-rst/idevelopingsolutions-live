<?php
/*
====================================================
🔥 PREMIUM HOSTING BOT — ULTIMATE v6.0 🔥
Admin: Full Control, No Limits
Users: HTML Only (or Admin Permission)
Delete System Included
Referral Management
100% Working & Optimized
====================================================
*/

// ==================== CONFIGURATION ====================
define('TOKEN', '8265049685:AAHcV1oAhIqsIskbbKtZQAOkSoP9vNfqAb4');
define('ADMIN_ID', '7915173083');
define('BOT_USERNAME', 'Host_freebot');
define('JOIN_CHANNEL', '@Rfcyberteam');
define('MAX_FILE_SIZE', 50 * 1024 * 1024); // 50MB

// ==================== FILE PATHS ====================
$dataFile = "data.json";
$hostsDir = "hosts";

// Create directories
if (!file_exists($hostsDir)) mkdir($hostsDir, 0777, true);

// Initialize data file
if (!file_exists($dataFile)) {
    $initialData = [
        "users" => [],
        "coins" => [],
        "hosts" => [],
        "pending" => [],
        "permitted" => [],
        "referrals" => [],
        "bot_enabled" => true,
        "referral_enabled" => true,
        "html_price" => 1,
        "referral_reward" => 1,
        "welcome_bonus" => 2,
        "broadcast_in_progress" => false,
        "settings" => [
            "max_user_files" => 10,
            "admin_no_limit" => true
        ]
    ];
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
}

// ==================== DATABASE FUNCTIONS ====================
function db() {
    global $dataFile;
    return json_decode(file_get_contents($dataFile), true);
}

function save($data) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}

// ==================== TELEGRAM FUNCTIONS ====================
function tgSend($chatId, $text, $keyboard = null) {
    $payload = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true
    ];
    
    if ($keyboard) {
        $payload['reply_markup'] = json_encode([
            'keyboard' => $keyboard,
            'resize_keyboard' => true
        ]);
    }
    
    $url = "https://api.telegram.org/bot" . TOKEN . "/sendMessage?" . http_build_query($payload);
    return @file_get_contents($url);
}

// ==================== GET UPDATE ====================
$update = json_decode(file_get_contents("php://input"), true);
if (!$update) exit;

$message = $update['message'] ?? null;
if (!$message) exit;

$chatId = $message['chat']['id'];
$userId = $message['from']['id'];
$username = $message['from']['username'] ?? 'User';
$text = $message['text'] ?? '';
$document = $message['document'] ?? null;
$photo = $message['photo'] ?? null;

// Load data
$botData = db();
$isAdmin = ($userId == ADMIN_ID);
$isPermitted = isset($botData['permitted'][$userId]);

// Initialize user data
if (!isset($botData['coins'][$userId])) {
    $botData['coins'][$userId] = 0;
}

// ==================== KEYBOARDS ====================
$userKeyboard = [
    ['📄 Host HTML'],
    ['📁 My Files', '🗑️ Delete My File'],
    ['🎯 Refer & Earn', '💰 My Coins']
];

$adminKeyboard = [
    ['📄 Host HTML', '📁 Host Any File'],
    ['📁 All Files', '🗑️ Delete File'],
    ['👥 Users', '👑 User Management'],
    ['⚙️ Settings', '💰 Coin Control'],
    ['🎯 Referral Control', '📢 Broadcast']
];

$keyboard = $isAdmin ? $adminKeyboard : $userKeyboard;

// ==================== USER REGISTRATION ====================
if (!isset($botData['users'][$userId])) {
    // Check channel membership
    $check = @file_get_contents("https://api.telegram.org/bot" . TOKEN . "/getChatMember?chat_id=" . JOIN_CHANNEL . "&user_id=$userId");
    $status = json_decode($check, true)['result']['status'] ?? 'left';
    
    if (!in_array($status, ['member', 'administrator', 'creator'])) {
        tgSend($chatId, "❌ <b>Join Required!</b>\n\nPlease join:\n" . JOIN_CHANNEL . "\n\nThen send /start again.");
        exit;
    }
    
    // Handle referral
    $referrerId = null;
    if (preg_match('/\/start ref-(\d+)/', $text, $matches)) {
        $referrerId = intval($matches[1]);
        if ($referrerId != $userId && isset($botData['users'][$referrerId])) {
            $botData['referrals'][$referrerId][$userId] = time();
            
            // Give referral reward
            if ($botData['referral_enabled']) {
                $reward = $botData['referral_reward'] ?? 1;
                $botData['coins'][$referrerId] += $reward;
                
                // Notify referrer
                tgSend($referrerId, "🎉 <b>Referral Reward!</b>\n\n@{$username} joined using your link!\n💰 You got <b>+{$reward} coins</b>");
            }
        }
    }
    
    // Register user
    $botData['users'][$userId] = [
        "id" => $userId,
        "username" => $username,
        "joined" => time(),
        "total_uploads" => 0
    ];
    
    // Give welcome bonus
    $welcomeBonus = $botData['welcome_bonus'] ?? 2;
    $botData['coins'][$userId] = $welcomeBonus;
    
    save($botData);
    
    // Welcome message
    $welcomeMsg = "✅ <b>Registration Successful!</b>\n\n";
    $welcomeMsg .= "👤 User: @{$username}\n";
    $welcomeMsg .= "💰 Welcome Bonus: <b>{$welcomeBonus} coins</b>\n";
    
    if ($referrerId) {
        $welcomeMsg .= "🤝 You were referred by a friend!\n";
    }
    
    $welcomeMsg .= "\n📦 <b>Features:</b>\n";
    $welcomeMsg .= "• Host HTML files\n";
    $welcomeMsg .= "• Direct download links\n";
    $welcomeMsg .= "• Refer & earn coins\n";
    $welcomeMsg .= "• File management\n\n";
    $welcomeMsg .= "Use menu below:";
    
    tgSend($chatId, $welcomeMsg, $keyboard);
    exit;
}

// ==================== START COMMAND ====================
if (strpos($text, '/start') === 0) {
    $welcomeMsg = "👋 <b>Welcome back, @{$username}!</b>\n\n";
    $welcomeMsg .= "💰 Coins: <b>" . ($botData['coins'][$userId] ?? 0) . "</b>\n";
    
    if ($isAdmin) {
        $welcomeMsg .= "⚡ <b>Admin Mode Active</b>\n";
        $welcomeMsg .= "🎯 Unlimited File Upload\n";
    } elseif ($isPermitted) {
        $welcomeMsg .= "⭐ <b>Special Permission Granted</b>\n";
        $welcomeMsg .= "📁 Any File Upload Enabled\n";
    }
    
    $welcomeMsg .= "\nSelect from menu:";
    
    tgSend($chatId, $welcomeMsg, $keyboard);
    exit;
}

// ==================== BOT STATUS CHECK ====================
if (!$botData['bot_enabled'] && !$isAdmin) {
    tgSend($chatId, "⛔ <b>Bot is Currently OFF</b>\n\nContact admin for help.", $keyboard);
    exit;
}

// ==================== COMMAND HANDLING ====================

// 📄 Host HTML (for all users)
if ($text == "📄 Host HTML") {
    $userCoins = $botData['coins'][$userId] ?? 0;
    $htmlPrice = $botData['html_price'] ?? 1;
    
    // Check coins for non-admin, non-permitted users
    if (!$isAdmin && !$isPermitted && $userCoins < $htmlPrice) {
        tgSend($chatId, "❌ <b>Insufficient Coins!</b>\n\nNeed: {$htmlPrice} coin\nYour balance: {$userCoins} coins\n\n🎯 Earn coins via Refer & Earn", $keyboard);
        exit;
    }
    
    // Check file limit for regular users
    if (!$isAdmin) {
        $userFiles = 0;
        foreach ($botData['hosts'] as $host) {
            if ($host['owner'] == $userId) $userFiles++;
        }
        
        $maxFiles = $botData['settings']['max_user_files'] ?? 10;
        if ($userFiles >= $maxFiles) {
            tgSend($chatId, "❌ <b>File Limit Reached!</b>\n\nMax files: {$maxFiles}\nYour files: {$userFiles}\n\n🗑️ Delete some files first.", $keyboard);
            exit;
        }
    }
    
    $botData['pending'][$userId] = [
        'type' => 'html',
        'price' => $htmlPrice
    ];
    save($botData);
    
    $uploadMsg = "📤 <b>Send HTML File</b>\n\n";
    
    if (!$isAdmin && !$isPermitted) {
        $uploadMsg .= "💰 Cost: <b>{$htmlPrice} coin</b>\n";
        $uploadMsg .= "💳 Your balance: <b>{$userCoins} coins</b>\n";
    }
    
    $uploadMsg .= "📦 Max size: 50MB\n";
    $uploadMsg .= "📄 Only .html/.htm files\n\n";
    $uploadMsg .= "Send your HTML file now:";
    
    tgSend($chatId, $uploadMsg, $keyboard);
    exit;
}

// 📁 Host Any File (Admin only or permitted users)
if ($text == "📁 Host Any File" && ($isAdmin || $isPermitted)) {
    $uploadMsg = "📤 <b>Send Any File</b>\n\n";
    
    if ($isAdmin) {
        $uploadMsg .= "⚡ <b>Admin Mode:</b> Unlimited upload\n";
    } else {
        $uploadMsg .= "⭐ <b>Special Permission:</b> All file types\n";
    }
    
    $uploadMsg .= "📦 Max size: 50MB\n";
    $uploadMsg .= "📁 All file types allowed\n";
    $uploadMsg .= "🎯 No coin deduction\n\n";
    $uploadMsg .= "Send any file now:";
    
    $botData['pending'][$userId] = ['type' => 'any'];
    save($botData);
    
    tgSend($chatId, $uploadMsg, $keyboard);
    exit;
}

// 📁 My Files
if ($text == "📁 My Files") {
    $userFiles = [];
    
    foreach ($botData['hosts'] as $slug => $host) {
        if ($host['owner'] == $userId) {
            $userFiles[$slug] = $host;
        }
    }
    
    if (empty($userFiles)) {
        tgSend($chatId, "📭 <b>No Files Found</b>\n\nYou haven't uploaded any files yet.\n\nStart with 📄 Host HTML", $keyboard);
    } else {
        $message = "📁 <b>Your Files</b>\n\n";
        $message .= "Total: <b>" . count($userFiles) . " files</b>\n\n";
        
        foreach ($userFiles as $slug => $file) {
            $fileUrl = "https://" . $_SERVER['HTTP_HOST'] . "/" . $file['file'];
            $fileName = basename($file['file']);
            $fileSize = isset($file['size']) ? formatFileSize($file['size']) : "N/A";
            $uploadTime = date("d/m/Y H:i", $file['time'] ?? time());
            
            $message .= "📄 <b>{$fileName}</b>\n";
            $message .= "📏 Size: {$fileSize}\n";
            $message .= "🕐 Uploaded: {$uploadTime}\n";
            $message .= "🔗 Link: <a href=\"{$fileUrl}\">{$fileUrl}</a>\n";
            $message .= "🗑️ Delete: /del_{$slug}\n\n";
        }
        
        tgSend($chatId, $message, $keyboard);
    }
    exit;
}

// 🗑️ Delete My File (User)
if ($text == "🗑️ Delete My File") {
    $userFiles = [];
    
    foreach ($botData['hosts'] as $slug => $host) {
        if ($host['owner'] == $userId) {
            $userFiles[$slug] = $host;
        }
    }
    
    if (empty($userFiles)) {
        tgSend($chatId, "📭 <b>No Files to Delete</b>\n\nYou have no uploaded files.", $keyboard);
    } else {
        $message = "🗑️ <b>Delete Your Files</b>\n\n";
        $message .= "Click on delete command below:\n\n";
        
        foreach ($userFiles as $slug => $file) {
            $fileName = basename($file['file']);
            $message .= "📄 {$fileName}\n";
            $message .= "❌ Delete: <code>/del_{$slug}</code>\n\n";
        }
        
        tgSend($chatId, $message, $keyboard);
    }
    exit;
}

// 🗑️ Delete File (Admin - All Files)
if ($text == "🗑️ Delete File" && $isAdmin) {
    if (empty($botData['hosts'])) {
        tgSend($chatId, "📭 <b>No Files in System</b>", $keyboard);
        exit;
    }
    
    $message = "🗑️ <b>Delete Any File</b>\n\n";
    $message .= "Total files: <b>" . count($botData['hosts']) . "</b>\n\n";
    
    $count = 0;
    foreach ($botData['hosts'] as $slug => $file) {
        $owner = $botData['users'][$file['owner']]['username'] ?? 'Unknown';
        $fileName = basename($file['file']);
        
        $message .= ($count + 1) . ". <b>{$fileName}</b>\n";
        $message .= "   👤 Owner: @{$owner}\n";
        $message .= "   ❌ Delete: <code>/del_{$slug}</code>\n\n";
        
        $count++;
        if ($count >= 15) {
            $message .= "... and " . (count($botData['hosts']) - 15) . " more files";
            break;
        }
    }
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// Delete file command (works for both admin and file owners)
if (strpos($text, '/del_') === 0) {
    $slug = str_replace('/del_', '', $text);
    
    if (!isset($botData['hosts'][$slug])) {
        tgSend($chatId, "❌ <b>File not found!</b>", $keyboard);
        exit;
    }
    
    $fileInfo = $botData['hosts'][$slug];
    
    // Check permission: Admin can delete any file, users can only delete their own
    if (!$isAdmin && $fileInfo['owner'] != $userId) {
        tgSend($chatId, "❌ <b>Permission denied!</b>\n\nYou can only delete your own files.", $keyboard);
        exit;
    }
    
    // Delete physical file
    if (file_exists($fileInfo['file'])) {
        unlink($fileInfo['file']);
    }
    
    // Delete from database
    unset($botData['hosts'][$slug]);
    
    // Update user upload count
    if (isset($botData['users'][$fileInfo['owner']])) {
        $botData['users'][$fileInfo['owner']]['total_uploads'] = 
            max(0, ($botData['users'][$fileInfo['owner']]['total_uploads'] ?? 0) - 1);
    }
    
    save($botData);
    
    $fileName = basename($fileInfo['file']);
    $ownerName = $botData['users'][$fileInfo['owner']]['username'] ?? 'User';
    
    if ($isAdmin && $fileInfo['owner'] != $userId) {
        // Notify file owner if admin deleted their file
        tgSend($fileInfo['owner'], "⚠️ <b>File Deleted by Admin</b>\n\nFile: {$fileName}\nWas deleted by administrator.");
    }
    
    tgSend($chatId, "✅ <b>File Deleted Successfully!</b>\n\n📄 File: {$fileName}\n👤 Owner: @{$ownerName}", $keyboard);
    exit;
}

// 💰 My Coins
if ($text == "💰 My Coins") {
    $userCoins = $botData['coins'][$userId] ?? 0;
    $htmlPrice = $botData['html_price'] ?? 1;
    $totalReferrals = isset($botData['referrals'][$userId]) ? count($botData['referrals'][$userId]) : 0;
    $referralReward = $botData['referral_reward'] ?? 1;
    
    $message = "💰 <b>Your Wallet</b>\n\n";
    $message .= "🪙 Balance: <b>{$userCoins} coins</b>\n";
    $message .= "📦 HTML Upload: {$htmlPrice} coin/file\n\n";
    
    $message .= "📊 <b>Referral Stats</b>\n";
    $message .= "👥 Total Referrals: <b>{$totalReferrals}</b>\n";
    $message .= "🎯 Reward per referral: {$referralReward} coin\n";
    $message .= "💰 Earned from referrals: <b>" . ($totalReferrals * $referralReward) . " coins</b>\n\n";
    
    if ($userCoins < $htmlPrice && !$isAdmin && !$isPermitted) {
        $message .= "⚠️ <b>Low Balance!</b>\n";
        $message .= "🎯 Use 'Refer & Earn' to get more coins!";
    }
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// 🎯 Refer & Earn
if ($text == "🎯 Refer & Earn") {
    $referralLink = "https://t.me/" . BOT_USERNAME . "?start=ref-$userId";
    $totalReferrals = isset($botData['referrals'][$userId]) ? count($botData['referrals'][$userId]) : 0;
    $reward = $botData['referral_reward'] ?? 1;
    
    $message = "🎯 <b>Referral Program</b>\n\n";
    $message .= "Earn <b>{$reward} coin</b> for each friend!\n\n";
    
    $message .= "🔗 <b>Your Referral Link:</b>\n";
    $message .= "<code>{$referralLink}</code>\n\n";
    
    $message .= "📊 <b>Your Statistics:</b>\n";
    $message .= "👥 Total Referrals: <b>{$totalReferrals}</b>\n";
    $message .= "💰 Total Earned: <b>" . ($totalReferrals * $reward) . " coins</b>\n\n";
    
    if ($totalReferrals > 0) {
        $message .= "🏆 <b>Recent Referrals:</b>\n";
        $referees = $botData['referrals'][$userId] ?? [];
        arsort($referees);
        $count = 0;
        foreach ($referees as $refId => $time) {
            if ($count >= 3) break;
            $refUser = $botData['users'][$refId]['username'] ?? 'User';
            $message .= "• @{$refUser}\n";
            $count++;
        }
    }
    
    $message .= "\n📝 <b>How it works:</b>\n";
    $message .= "1. Share your link above\n";
    $message .= "2. Friends join " . JOIN_CHANNEL . "\n";
    $message .= "3. They click your link\n";
    $message .= "4. You get {$reward} coin instantly!";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// ==================== ADMIN COMMANDS ====================

// 👥 Users (Admin)
if ($text == "👥 Users" && $isAdmin) {
    $totalUsers = count($botData['users']);
    $activeToday = 0;
    $today = date('Y-m-d');
    
    foreach ($botData['users'] as $user) {
        if (isset($user['last_active']) && date('Y-m-d', $user['last_active']) == $today) {
            $activeToday++;
        }
    }
    
    $message = "👥 <b>User Statistics</b>\n\n";
    $message .= "📊 Total Users: <b>{$totalUsers}</b>\n";
    $message .= "🚀 Active Today: <b>{$activeToday}</b>\n";
    $message .= "📁 Total Files: <b>" . count($botData['hosts']) . "</b>\n\n";
    
    $message .= "🏆 <b>Top 5 Users (Coins):</b>\n";
    arsort($botData['coins']);
    $count = 0;
    foreach ($botData['coins'] as $uid => $coins) {
        if ($count >= 5) break;
        $user = $botData['users'][$uid]['username'] ?? 'Unknown';
        $message .= ($count + 1) . ". @{$user}: <b>{$coins} coins</b>\n";
        $count++;
    }
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// 👑 User Management (Admin)
if ($text == "👑 User Management" && $isAdmin) {
    $message = "👑 <b>User Management Panel</b>\n\n";
    $message .= "Available commands:\n\n";
    $message .= "1. <code>/giveperm [user_id]</code>\n";
    $message .= "   Give any file upload permission\n\n";
    $message .= "2. <code>/removeperm [user_id]</code>\n";
    $message .= "   Remove upload permission\n\n";
    $message .= "3. <code>/userinfo [user_id]</code>\n";
    $message .= "   View user details\n\n";
    $message .= "4. <code>/addref [user_id] [amount]</code>\n";
    $message .= "   Add referral bonus manually";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// User management commands
if ($isAdmin) {
    // Give permission
    if (preg_match('/^\/giveperm\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        
        if (isset($botData['users'][$targetId])) {
            $botData['permitted'][$targetId] = true;
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Permission Granted!</b>\n\nUser @{$targetUser} can now upload any file type.", $keyboard);
            
            // Notify user
            tgSend($targetId, "⭐ <b>Special Permission Granted!</b>\n\nYou can now upload any file type!\n\nUse '📁 Host Any File' from menu.");
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
    
    // Remove permission
    if (preg_match('/^\/removeperm\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        
        if (isset($botData['permitted'][$targetId])) {
            unset($botData['permitted'][$targetId]);
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Permission Removed!</b>\n\nUser @{$targetUser} can no longer upload any file.", $keyboard);
            
            // Notify user
            tgSend($targetId, "⚠️ <b>Permission Revoked</b>\n\nYour special upload permission has been removed.\n\nYou can now only upload HTML files.");
        } else {
            tgSend($chatId, "❌ User doesn't have permission or not found!", $keyboard);
        }
        exit;
    }
    
    // User info
    if (preg_match('/^\/userinfo\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        
        if (isset($botData['users'][$targetId])) {
            $user = $botData['users'][$targetId];
            $coins = $botData['coins'][$targetId] ?? 0;
            $uploads = $user['total_uploads'] ?? 0;
            $joined = date("d/m/Y H:i", $user['joined']);
            $lastActive = isset($user['last_active']) ? date("d/m/Y H:i", $user['last_active']) : "Never";
            $hasPermission = isset($botData['permitted'][$targetId]) ? "✅ Yes" : "❌ No";
            
            // Count user's files
            $userFiles = 0;
            foreach ($botData['hosts'] as $host) {
                if ($host['owner'] == $targetId) $userFiles++;
            }
            
            // Count referrals
            $referrals = isset($botData['referrals'][$targetId]) ? count($botData['referrals'][$targetId]) : 0;
            
            $message = "👤 <b>User Information</b>\n\n";
            $message .= "🆔 ID: <code>{$targetId}</code>\n";
            $message .= "👤 Username: @{$user['username']}\n";
            $message .= "💰 Coins: <b>{$coins}</b>\n";
            $message .= "📁 Total Uploads: {$uploads}\n";
            $message .= "📄 Current Files: {$userFiles}\n";
            $message .= "👥 Referrals: {$referrals}\n";
            $message .= "⭐ Special Permission: {$hasPermission}\n";
            $message .= "📅 Joined: {$joined}\n";
            $message .= "🕐 Last Active: {$lastActive}\n\n";
            
            $message .= "⚡ <b>Quick Actions:</b>\n";
            $message .= "Give Permission: <code>/giveperm {$targetId}</code>\n";
            $message .= "Add Coins: <code>/addcoin {$targetId} 10</code>\n";
            $message .= "Delete User Files: Check All Files menu";
            
            tgSend($chatId, $message, $keyboard);
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
    
    // Add referral bonus manually
    if (preg_match('/^\/addref\s+(\d+)\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        $amount = intval($matches[2]);
        
        if (isset($botData['users'][$targetId])) {
            $botData['coins'][$targetId] = ($botData['coins'][$targetId] ?? 0) + $amount;
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Referral Bonus Added!</b>\n\nAdded <b>{$amount} coins</b> to @{$targetUser}", $keyboard);
            
            // Notify user
            tgSend($targetId, "🎁 <b>Bonus Received!</b>\n\nAdmin gave you <b>{$amount} coins</b> as referral bonus!\n\n💰 New balance: <b>{$botData['coins'][$targetId]} coins</b>");
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
}

// 📁 All Files (Admin)
if ($text == "📁 All Files" && $isAdmin) {
    if (empty($botData['hosts'])) {
        tgSend($chatId, "📭 <b>No Files in System</b>", $keyboard);
        exit;
    }
    
    $totalSize = 0;
    foreach ($botData['hosts'] as $file) {
        $totalSize += $file['size'] ?? 0;
    }
    
    $message = "📁 <b>All Files in System</b>\n\n";
    $message .= "📊 Total Files: <b>" . count($botData['hosts']) . "</b>\n";
    $message .= "📦 Total Size: " . formatFileSize($totalSize) . "\n\n";
    
    $count = 0;
    foreach ($botData['hosts'] as $slug => $file) {
        if ($count >= 10) break;
        
        $owner = $botData['users'][$file['owner']]['username'] ?? 'Unknown';
        $fileName = basename($file['file']);
        $fileUrl = "https://" . $_SERVER['HTTP_HOST'] . "/" . $file['file'];
        $fileSize = formatFileSize($file['size'] ?? 0);
        $uploadTime = date("d/m H:i", $file['time'] ?? time());
        
        $message .= ($count + 1) . ". <b>{$fileName}</b>\n";
        $message .= "   👤 @{$owner} | 📏 {$fileSize}\n";
        $message .= "   🕐 {$uploadTime}\n";
        $message .= "   🔗 <a href=\"{$fileUrl}\">Download</a>\n";
        $message .= "   ❌ /del_{$slug}\n\n";
        
        $count++;
    }
    
    if (count($botData['hosts']) > 10) {
        $message .= "... and " . (count($botData['hosts']) - 10) . " more files";
    }
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// ⚙️ Settings (Admin)
if ($text == "⚙️ Settings" && $isAdmin) {
    $message = "⚙️ <b>Bot Settings</b>\n\n";
    
    $message .= "🔌 <b>Bot Status:</b> " . ($botData['bot_enabled'] ? "✅ ON" : "⛔ OFF") . "\n";
    $message .= "🎯 <b>Referral System:</b> " . ($botData['referral_enabled'] ? "✅ ON" : "⛔ OFF") . "\n\n";
    
    $message .= "💰 <b>Pricing Settings:</b>\n";
    $message .= "• HTML Upload: " . ($botData['html_price'] ?? 1) . " coin\n";
    $message .= "• Referral Reward: " . ($botData['referral_reward'] ?? 1) . " coin\n";
    $message .= "• Welcome Bonus: " . ($botData['welcome_bonus'] ?? 2) . " coins\n\n";
    
    $message .= "📦 <b>User Limits:</b>\n";
    $message .= "• Max files/user: " . ($botData['settings']['max_user_files'] ?? 10) . "\n";
    $message .= "• Max file size: 50MB\n";
    $message .= "• Admin limit: " . ($botData['settings']['admin_no_limit'] ? "🚫 No Limit" : "Limited") . "\n\n";
    
    $message .= "🔧 <b>Change Settings:</b>\n";
    $message .= "Set Price: <code>/setprice [amount]</code>\n";
    $message .= "Set Referral: <code>/setref [amount]</code>\n";
    $message .= "Set Welcome: <code>/setwelcome [amount]</code>\n";
    $message .= "Set Max Files: <code>/setmax [number]</code>";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// Settings change commands
if ($isAdmin) {
    // Set HTML price
    if (preg_match('/^\/setprice\s+(\d+)$/', $text, $matches)) {
        $amount = intval($matches[1]);
        $botData['html_price'] = $amount;
        save($botData);
        tgSend($chatId, "✅ <b>Price Updated!</b>\n\nHTML upload price set to: <b>{$amount} coin(s)</b>", $keyboard);
        exit;
    }
    
    // Set referral reward
    if (preg_match('/^\/setref\s+(\d+)$/', $text, $matches)) {
        $amount = intval($matches[1]);
        $botData['referral_reward'] = $amount;
        save($botData);
        tgSend($chatId, "✅ <b>Referral Reward Updated!</b>\n\nReferral reward set to: <b>{$amount} coin(s)</b>", $keyboard);
        exit;
    }
    
    // Set welcome bonus
    if (preg_match('/^\/setwelcome\s+(\d+)$/', $text, $matches)) {
        $amount = intval($matches[1]);
        $botData['welcome_bonus'] = $amount;
        save($botData);
        tgSend($chatId, "✅ <b>Welcome Bonus Updated!</b>\n\nNew users will get: <b>{$amount} coin(s)</b>", $keyboard);
        exit;
    }
    
    // Set max files per user
    if (preg_match('/^\/setmax\s+(\d+)$/', $text, $matches)) {
        $amount = intval($matches[1]);
        $botData['settings']['max_user_files'] = $amount;
        save($botData);
        tgSend($chatId, "✅ <b>File Limit Updated!</b>\n\nMax files per user: <b>{$amount}</b>", $keyboard);
        exit;
    }
}

// 💰 Coin Control (Admin)
if ($text == "💰 Coin Control" && $isAdmin) {
    $message = "💰 <b>Coin Management</b>\n\n";
    $message .= "Total coins in system: <b>" . array_sum($botData['coins']) . "</b>\n\n";
    
    $message .= "⚡ <b>Quick Commands:</b>\n\n";
    $message .= "1. <code>/addcoin [user_id] [amount]</code>\n";
    $message .= "   Add coins to user\n\n";
    $message .= "2. <code>/removecoin [user_id] [amount]</code>\n";
    $message .= "   Remove coins from user\n\n";
    $message .= "3. <code>/resetcoin [user_id]</code>\n";
    $message .= "   Reset user's coins to 0\n\n";
    $message .= "4. <code>/giveall [amount]</code>\n";
    $message .= "   Give coins to all users";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// Coin control commands
if ($isAdmin) {
    // Add coins
    if (preg_match('/^\/addcoin\s+(\d+)\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        $amount = intval($matches[2]);
        
        if (isset($botData['users'][$targetId])) {
            $botData['coins'][$targetId] = ($botData['coins'][$targetId] ?? 0) + $amount;
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Coins Added!</b>\n\nAdded <b>{$amount} coins</b> to @{$targetUser}", $keyboard);
            
            // Notify user
            tgSend($targetId, "🎉 <b>Coins Received!</b>\n\nAdmin gave you <b>{$amount} coins</b>!\n\n💰 New balance: <b>{$botData['coins'][$targetId]} coins</b>");
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
    
    // Remove coins
    if (preg_match('/^\/removecoin\s+(\d+)\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        $amount = intval($matches[2]);
        
        if (isset($botData['users'][$targetId])) {
            $botData['coins'][$targetId] = max(0, ($botData['coins'][$targetId] ?? 0) - $amount);
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Coins Removed!</b>\n\nRemoved <b>{$amount} coins</b> from @{$targetUser}", $keyboard);
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
    
    // Reset coins
    if (preg_match('/^\/resetcoin\s+(\d+)$/', $text, $matches)) {
        $targetId = intval($matches[1]);
        
        if (isset($botData['users'][$targetId])) {
            $oldAmount = $botData['coins'][$targetId] ?? 0;
            $botData['coins'][$targetId] = 0;
            save($botData);
            
            $targetUser = $botData['users'][$targetId]['username'] ?? 'User';
            tgSend($chatId, "✅ <b>Coins Reset!</b>\n\nReset @{$targetUser}'s coins from {$oldAmount} to 0", $keyboard);
        } else {
            tgSend($chatId, "❌ User not found!", $keyboard);
        }
        exit;
    }
    
    // Give coins to all users
    if (preg_match('/^\/giveall\s+(\d+)$/', $text, $matches)) {
        $amount = intval($matches[1]);
        $totalUsers = count($botData['users']);
        $updated = 0;
        
        foreach ($botData['users'] as $uid => $user) {
            $botData['coins'][$uid] = ($botData['coins'][$uid] ?? 0) + $amount;
            $updated++;
            
            // Notify user
            if ($uid != $userId) {
                tgSend($uid, "🎁 <b>Bonus for Everyone!</b>\n\nAdmin gave <b>{$amount} coins</b> to all users!\n\n💰 You got: <b>{$amount} coins</b>");
            }
        }
        
        save($botData);
        tgSend($chatId, "✅ <b>Coins Distributed!</b>\n\nGave <b>{$amount} coins</b> to all {$updated} users", $keyboard);
        exit;
    }
}

// 🎯 Referral Control (Admin)
if ($text == "🎯 Referral Control" && $isAdmin) {
    $totalReferrals = 0;
    foreach ($botData['referrals'] as $refs) {
        $totalReferrals += count($refs);
    }
    
    $message = "🎯 <b>Referral System Control</b>\n\n";
    $message .= "📊 Total Referrals: <b>{$totalReferrals}</b>\n";
    $message .= "💰 Current Reward: <b>" . ($botData['referral_reward'] ?? 1) . " coin(s)</b>\n";
    $message .= "🔧 Status: " . ($botData['referral_enabled'] ? "✅ ON" : "⛔ OFF") . "\n\n";
    
    $message .= "🏆 <b>Top 5 Referrers:</b>\n";
    $referralCounts = [];
    foreach ($botData['referrals'] as $uid => $refs) {
        $referralCounts[$uid] = count($refs);
    }
    arsort($referralCounts);
    
    $count = 0;
    foreach ($referralCounts as $uid => $refCount) {
        if ($count >= 5) break;
        $user = $botData['users'][$uid]['username'] ?? 'Unknown';
        $message .= ($count + 1) . ". @{$user}: <b>{$refCount} referrals</b>\n";
        $count++;
    }
    
    $message .= "\n⚡ <b>Commands:</b>\n";
    $message .= "Toggle: /togglereferral\n";
    $message .= "Set Reward: <code>/setref [amount]</code>\n";
    $message .= "Reset All: /resetreferrals";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// Referral control commands
if ($isAdmin) {
    // Toggle referral system
    if ($text == "/togglereferral") {
        $botData['referral_enabled'] = !$botData['referral_enabled'];
        save($botData);
        
        $status = $botData['referral_enabled'] ? "✅ ON" : "⛔ OFF";
        tgSend($chatId, "✅ <b>Referral System Updated!</b>\n\nStatus: <b>{$status}</b>", $keyboard);
        exit;
    }
    
    // Reset all referrals
    if ($text == "/resetreferrals") {
        $botData['referrals'] = [];
        save($botData);
        tgSend($chatId, "✅ <b>All Referrals Reset!</b>\n\nReferral data has been cleared.", $keyboard);
        exit;
    }
}

// 📢 Broadcast (Admin)
if ($text == "📢 Broadcast" && $isAdmin) {
    if ($botData['broadcast_in_progress']) {
        tgSend($chatId, "⏳ <b>Broadcast in progress!</b>\n\nPlease wait for current broadcast to finish.", $keyboard);
        exit;
    }
    
    $botData['pending'][$userId] = ['type' => 'broadcast'];
    save($botData);
    
    $message = "📢 <b>Broadcast System</b>\n\n";
    $message .= "Total users: <b>" . count($botData['users']) . "</b>\n\n";
    $message .= "Type your broadcast message:\n";
    $message .= "(HTML formatting supported)\n\n";
    $message .= "Cancel: Type 'cancel'";
    
    tgSend($chatId, $message, $keyboard);
    exit;
}

// ==================== PENDING OPERATIONS ====================
if (isset($botData['pending'][$userId]) && !empty($text)) {
    $pending = $botData['pending'][$userId];
    
    // Cancel operation
    if (strtolower($text) == 'cancel') {
        unset($botData['pending'][$userId]);
        save($botData);
        tgSend($chatId, "❌ Operation cancelled.", $keyboard);
        exit;
    }
    
    // Broadcast
    if ($pending['type'] == 'broadcast') {
        $broadcastMessage = $text;
        $totalUsers = count($botData['users']);
        
        // Set broadcast flag
        $botData['broadcast_in_progress'] = true;
        unset($botData['pending'][$userId]);
        save($botData);
        
        // Send initial message
        tgSend($chatId, "📡 <b>Broadcast Started!</b>\n\nSending to {$totalUsers} users...", $keyboard);
        
        // Send broadcasts
        $sent = 0;
        $failed = 0;
        
        foreach ($botData['users'] as $user) {
            if ($user['id'] == $userId) continue;
            
            try {
                tgSend($user['id'], "📢 <b>Broadcast Message</b>\n\n{$broadcastMessage}\n\n🤖 @" . BOT_USERNAME);
                $sent++;
                
                // Small delay to avoid rate limit
                if ($sent % 10 == 0) sleep(1);
            } catch (Exception $e) {
                $failed++;
            }
        }
        
        // Clear broadcast flag
        $botData['broadcast_in_progress'] = false;
        save($botData);
        
        // Send final report
        $finalMsg = "✅ <b>Broadcast Complete!</b>\n\n";
        $finalMsg .= "📊 <b>Results:</b>\n";
        $finalMsg .= "✅ Sent: <b>{$sent}</b>\n";
        $finalMsg .= "❌ Failed: <b>{$failed}</b>\n";
        $finalMsg .= "👥 Total: <b>{$totalUsers}</b>\n";
        $finalMsg .= "📈 Success rate: <b>" . round($sent / $totalUsers * 100, 1) . "%</b>\n\n";
        $finalMsg .= "🎉 Broadcast finished successfully!";
        
        tgSend($chatId, $finalMsg, $keyboard);
        exit;
    }
}

// ==================== FILE UPLOAD HANDLING ====================
if (isset($botData['pending'][$userId]) && ($document || $photo)) {
    $pending = $botData['pending'][$userId];
    
    // Get file info
    if ($document) {
        $fileId = $document['file_id'];
        $fileName = $document['file_name'];
        $fileSize = $document['file_size'] ?? 0;
        $mimeType = $document['mime_type'] ?? 'application/octet-stream';
    } elseif ($photo) {
        // Get largest photo
        $largestPhoto = end($photo);
        $fileId = $largestPhoto['file_id'];
        $fileName = "photo_" . time() . ".jpg";
        $fileSize = $largestPhoto['file_size'] ?? 0;
        $mimeType = 'image/jpeg';
    } else {
        exit;
    }
    
    // Check file size
    if ($fileSize > MAX_FILE_SIZE) {
        tgSend($chatId, "❌ <b>File too large!</b>\n\nMaximum: 50MB\nYour file: " . round($fileSize / 1024 / 1024, 2) . "MB", $keyboard);
        exit;
    }
    
    // Check file type for regular users uploading HTML
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    if ($pending['type'] == 'html' && !$isAdmin && !$isPermitted) {
        if (!in_array($fileExt, ['html', 'htm'])) {
            tgSend($chatId, "❌ <b>Only HTML files allowed!</b>\n\nYour file: .{$fileExt}\n\nGet permission from admin to upload any file.", $keyboard);
            exit;
        }
        
        // Deduct coins for regular users
        $price = $pending['price'] ?? 1;
        $botData['coins'][$userId] = max(0, ($botData['coins'][$userId] ?? 0) - $price);
    }
    
    // Download file
    $fileInfo = json_decode(file_get_contents("https://api.telegram.org/bot" . TOKEN . "/getFile?file_id=" . $fileId), true);
    
    if (!isset($fileInfo['result']['file_path'])) {
        tgSend($chatId, "❌ Failed to download file.", $keyboard);
        exit;
    }
    
    $filePath = $fileInfo['result']['file_path'];
    $fileUrl = "https://api.telegram.org/file/bot" . TOKEN . "/" . $filePath;
    
    // Generate unique filename
    $slug = bin2hex(random_bytes(8));
    $safeName = preg_replace('/[^a-zA-Z0-9\.\-_]/', '_', $fileName);
    $savePath = "$hostsDir/{$slug}_{$safeName}";
    
    // Save file
    $content = file_get_contents($fileUrl);
    if ($content === false) {
        tgSend($chatId, "❌ Failed to save file.", $keyboard);
        exit;
    }
    
    file_put_contents($savePath, $content);
    
    // Save to database
    $publicLink = "https://" . $_SERVER['HTTP_HOST'] . "/" . $savePath;
    
    $botData['hosts'][$slug] = [
        'owner' => $userId,
        'file' => $savePath,
        'filename' => $fileName,
        'type' => $fileExt,
        'size' => $fileSize,
        'time' => time(),
        'link' => $publicLink
    ];
    
    // Update user upload count
    $botData['users'][$userId]['total_uploads'] = ($botData['users'][$userId]['total_uploads'] ?? 0) + 1;
    $botData['users'][$userId]['last_active'] = time();
    
    // Clear pending
    unset($botData['pending'][$userId]);
    save($botData);
    
    // Send success message
    $fileSizeFormatted = formatFileSize($fileSize);
    
    $successMsg = "✅ <b>File Uploaded Successfully!</b>\n\n";
    $successMsg .= "📄 File: <b>{$fileName}</b>\n";
    $successMsg .= "📦 Type: .{$fileExt}\n";
    $successMsg .= "📏 Size: {$fileSizeFormatted}\n";
    $successMsg .= "🕐 Time: " . date("d/m/Y H:i") . "\n\n";
    
    $successMsg .= "🔗 <b>Direct URL:</b>\n";
    $successMsg .= "<code>{$publicLink}</code>\n\n";
    
    if ($pending['type'] == 'html' && !$isAdmin && !$isPermitted) {
        $successMsg .= "💰 <b>{$price} coin deducted</b>\n";
        $successMsg .= "💳 Remaining: <b>" . ($botData['coins'][$userId] ?? 0) . " coins</b>\n\n";
    }
    
    $successMsg .= "📤 Share this URL anywhere!\n";
    $successMsg .= "🗑️ Delete: <code>/del_{$slug}</code>";
    
    tgSend($chatId, $successMsg, $keyboard);
    exit;
}

// ==================== DEFAULT RESPONSE ====================
if (!empty($text) && !isset($botData['pending'][$userId])) {
    // Update last active
    $botData['users'][$userId]['last_active'] = time();
    save($botData);
    
    $defaultMsg = "🤖 <b>Premium Hosting Bot</b>\n\n";
    $defaultMsg .= "Use the menu buttons below.\n\n";
    $defaultMsg .= "🆘 Help: /help\n";
    $defaultMsg .= "🏠 Menu: /start";
    
    tgSend($chatId, $defaultMsg, $keyboard);
}

// Help command
if ($text == "/help") {
    $helpMsg = "🆘 <b>Help Center</b>\n\n";
    
    $helpMsg .= "📦 <b>For Regular Users:</b>\n";
    $helpMsg .= "• Upload HTML files (1 coin each)\n";
    $helpMsg .= "• Refer friends to earn coins\n";
    $helpMsg .= "• Manage your uploaded files\n\n";
    
    $helpMsg .= "⭐ <b>For Special Users:</b>\n";
    $helpMsg .= "• Upload any file type (free)\n";
    $helpMsg .= "• No coin deduction\n";
    $helpMsg .= "(Ask admin for permission)\n\n";
    
    $helpMsg .= "⚡ <b>For Admin:</b>\n";
    $helpMsg .= "• Unlimited file upload\n";
    $helpMsg .= "• User management\n";
    $helpMsg .= "• Coin control\n";
    $helpMsg .= "• Broadcast messages\n\n";
    
    $helpMsg .= "📞 <b>Support:</b>\n";
    $helpMsg .= "Contact admin for any issues.";
    
    tgSend($chatId, $helpMsg, $keyboard);
    exit;
}

// ==================== HELPER FUNCTIONS ====================
function formatFileSize($bytes) {
    if ($bytes == 0) return "0 B";
    
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = floor(log($bytes, 1024));
    
    return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
}

// Save final data
save($botData);

?>