<?php
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';

require_once $projectRoot.'/model/Classes/User.class.php';
require_once $projectRoot.'/model/Classes/RefPlan.class.php';
require_once $projectRoot.'/model/Classes/Account.class.php';
require_once $projectRoot.'/model/Classes/RefAction.class.php';
require_once $projectRoot.'/model/Classes/Transaction.class.php';
require_once $projectRoot.'/model/Classes/Connection.class.php';
require_once $projectRoot.'/model/Classes/Element.class.php';
require_once $projectRoot.'/model/Classes/RefElement.class.php';
require_once $projectRoot.'/model/Classes/Right.class.php';
require_once $projectRoot.'/model/Classes/RefRight.class.php';

require_once $projectRoot.'/model/Interfaces/AccountManager.interface.php';
require_once $projectRoot.'/model/Interfaces/RefPlanManager.interface.php';
require_once $projectRoot.'/model/Interfaces/UserManager.interface.php';
require_once $projectRoot.'/model/Interfaces/RefActionManager.interface.php';
require_once $projectRoot.'/model/Interfaces/TransactionManager.interface.php';
require_once $projectRoot.'/model/Interfaces/ConnectionManager.interface.php';
require_once $projectRoot.'/model/Interfaces/ElementManager.interface.php';
require_once $projectRoot.'/model/Interfaces/RefElementManager.interface.php';
require_once $projectRoot.'/model/Interfaces/RightManager.interface.php';
require_once $projectRoot.'/model/Interfaces/RefRightManager.interface.php';

require_once $projectRoot.'/model/Pdo/AbstractPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/UserPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/RefPlanPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/AccountPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/RefActionPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/TransactionPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/ConnectionPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/ElementPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/RefElementPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/RightPdoManager.class.php';
require_once $projectRoot.'/model/Pdo/RefRightPdoManager.class.php';

//require_once $projectRoot.'/utils/FileSystemManager.php';
//require_once $projectRoot.'/utils/ActionManager.php';

//require_once $projectRoot.'/controller/login.php';
require_once $projectRoot.'/controller/functions.php';
//require_once $projectRoot.'/controller/fancybox/renameElement.php';

?>