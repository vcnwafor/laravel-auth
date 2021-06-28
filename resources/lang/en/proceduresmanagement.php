<?php

return [

    // Titles
    'showing-all-procedures'     => 'Showing All Procedures',
    'procedures-menu-alt'        => 'Show Procedures Management Menu',
    'create-new-procedure'       => 'Create New Procedure',
    'show-deleted-procedures'    => 'Show Deleted Procedure',
    'editing-procedure'          => 'Editing Procedure :name',
    'showing-procedure'          => 'Showing Procedure :name',
    'showing-procedure-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created procedure! ',
    'updateSuccess'   => 'Successfully updated procedure! ',
    'deleteSuccess'   => 'Successfully deleted procedure! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Procedure Tab
    'viewProfile'            => 'View Profile',
    'editProcedure'               => 'Edit Procedure',
    'deleteProcedure'             => 'Delete Procedure',
    'deletePdoc'                  => 'Delete Document',
    'proceduresBackBtn'           => 'Back to Procedures',
    'proceduresPanelTitle'        => 'Procedure Information',
    'labelProcedureName'          => 'Procedurename:',
    'labelEmail'             => 'Email:',
    'labelName'              => 'Name:',
    'labelDescription'       => 'Description:',
    'labelRole'              => 'Role:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelCreatedAt'         => 'Created At:',
    'labelUpdatedAt'         => 'Updated At:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpConfirm'         => 'Confirmation IP:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'Admin Signup IP:',
    'labelIpUpdate'          => 'Last Update IP:',
    'labelDeletedAt'         => 'Deleted on',
    'labelIpDeleted'         => 'Deleted IP:',
    'proceduresDeletedPanelTitle' => 'Deleted Procedure Information',
    'proceduresBackDelBtn'        => 'Back to Deleted Procedures',

    'successRestore'    => 'Procedure successfully restored.',
    'successDestroy'    => 'Procedure record successfully destroyed.',
    'errorProcedureNotFound' => 'Procedure not found.',

    'labelProcedureLevel'  => 'Level',
    'labelProcedureLevels' => 'Levels',

    'procedures-table' => [
        'caption'   => '{1} :procedurescount procedure total|[2,*] :procedurescount total procedures',
        'id'        => 'ID',
        'name'      => 'Name',
        'description'     => 'Description',
        'lname'     => 'Last Name',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Procedure',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Procedure</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Procedure</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Procedure</span>',
        'back-to-procedures' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Procedures</span>',
        'back-to-procedure'  => 'Back  <span class="hidden-xs">to Procedure</span>',
        'delete-procedure'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Procedure</span>',
        'edit-procedure'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Procedure</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Procedure',
        'back-procedures'    => 'Back to procedures',
        'email-procedure'    => 'Email :procedure',
        'submit-search' => 'Submit Procedures Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'procedureNameTaken'          => 'Procedurename is taken',
        'procedureNameRequired'       => 'Procedurename is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Procedure role is required.',
        'procedure-creation-success'  => 'Successfully created procedure!',
        'update-procedure-success'    => 'Successfully updated procedure!',
        'delete-success'         => 'Successfully deleted the procedure!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-procedure' => [
        'id'                => 'Procedure ID',
        'name'              => 'Procedurename',
        'email'             => '<span class="hidden-xs">Procedure </span>Email',
        'role'              => 'Procedure Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Procedure Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Procedure</span> Access Level|<span class="hidden-xs">Procedure</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-procedures-ph'   => 'Search Procedures',
    ],

    'modals' => [
        'delete_procedure_message' => 'Are you sure you want to delete :procedure?',
        'edit_procedure__modal_text_confirm_title' => 'Are you sure you want to Change this :procedure?',
        'edit_procedure__modal_text_confirm_message' => 'Are you sure you want to Update this :procedure?',
    ],
];
