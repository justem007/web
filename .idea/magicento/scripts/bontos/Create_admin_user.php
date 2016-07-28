<?php 
// $currentFileContent = $GLOBALS['Magicento']['editor_text'];
// $currentFilePath = $GLOBALS['Magicento']['file_path'];
// $selectedText = $GLOBALS['Magicento']['selected_text'];
// $caretOffset = $GLOBALS['Magicento']['caret_offset'];
// $currentProjectPath = $GLOBALS['Magicento']['current_project_path'];
// $GLOBALS['MagicentoActions']['alert'] = 'Some text here to show with an alert inside the IDE';
// $GLOBALS['MagicentoActions']['info'] = 'Text here will be shown with a Notification of type INFO';
// $GLOBALS['MagicentoActions']['warning'] = 'Text here will be shown with a Notification of type WARNING';
// $GLOBALS['MagicentoActions']['error'] = 'Text here will be shown with a Notification of type ERROR';
// $GLOBALS['MagicentoActions']['refresh'] = array($absoluteFilePath,...); // These files will be refreshed (useful if you change the content of some file inside this script)
// $GLOBALS['MagicentoActions']['open'] = array($absoluteFilePath,...); // These files will be opened (useful if you are creating a new file)
// To open the files on a specific position use: array($absoluteFilePath.'::'.$positionNumber,...) 
// $Username = $GLOBALS['Magicento']['params']['Username'];
// $Password = $GLOBALS['Magicento']['params']['Password'];

$user = Mage::getModel('admin/user');
$user->setUsername($GLOBALS['Magicento']['params']['Username']);
$user->setPassword($GLOBALS['Magicento']['params']['Password']);

$firstName = $GLOBALS['Magicento']['params']['Firstname'] ? $GLOBALS['Magicento']['params']['Firstname'] : '1';
$lastName = $GLOBALS['Magicento']['params']['Lastname'] ? $GLOBALS['Magicento']['params']['Lastname']: '1';
$email = $GLOBALS['Magicento']['params']['Email'] ? $GLOBALS['Magicento']['params']['Email'] : 'b@bb.com';

$user->setFirstname($firstName);
$user->setLastname($lastName);
$user->setEmail($email);

$result = $user->validate();
if (is_array($result)) {
    echo 'User validation failed : ' . PHP_EOL;
    foreach ($result as $message) {
        echo '- ' . $message . PHP_EOL;
    }
} else {
    $user->save();
    $user->setRoleIds(array(1))
        ->setRoleUserId($user->getUserId())
        ->saveRelations();
    echo 'User "' . $GLOBALS['Magicento']['params']['Username'] . '" has been successfully saved !';
}
