<?php

return [

    // Titles
    'showing-all-reports'     => 'Showing All Reports',
    'reports-menu-alt'        => 'Show Reports Management Menu',
    'create-new-report'       => 'Create New Report',
    'show-deleted-reports'    => 'Show Deleted Report',
    'editing-report'          => 'Editing Report :name',
    'showing-report'          => 'Showing Report :name',
    'showing-report-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created report! ',
    'updateSuccess'   => 'Successfully updated report! ',
    'deleteSuccess'   => 'Successfully deleted report! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Report Tab
    'viewProfile'            => 'View Profile',
    'editReport'               => 'Edit Report',
    'deleteReport'             => 'Delete Report',
    'reportsBackBtn'           => 'Back to Reports',
    'reportsPanelTitle'        => 'Report Information',
    'labelReportName'          => 'Reportname:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'First Name:',
    'labelLastName'          => 'Last Name:',
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
    'reportsDeletedPanelTitle' => 'Deleted Report Information',
    'reportsBackDelBtn'        => 'Back to Deleted Reports',

    'successRestore'    => 'Report successfully restored.',
    'successDestroy'    => 'Report record successfully destroyed.',
    'errorReportNotFound' => 'Report not found.',

    'labelReportLevel'  => 'Level',
    'labelReportLevels' => 'Levels',

    'reports-table' => [
        'caption'   => '{1} :reportscount report total|[2,*] :reportscount total reports',
        'id'        => 'ID',
        'name'      => 'Reportname',
        'fname'     => 'First Name',
        'lname'     => 'Last Name',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Report',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Report</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Report</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Report</span>',
        'back-to-reports' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Reports</span>',
        'back-to-report'  => 'Back  <span class="hidden-xs">to Report</span>',
        'delete-report'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Report</span>',
        'edit-report'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Report</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Report',
        'back-reports'    => 'Back to reports',
        'email-report'    => 'Email :report',
        'submit-search' => 'Submit Reports Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'reportNameTaken'          => 'Reportname is taken',
        'reportNameRequired'       => 'Reportname is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Report role is required.',
        'report-creation-success'  => 'Successfully created report!',
        'update-report-success'    => 'Successfully updated report!',
        'delete-success'         => 'Successfully deleted the report!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-report' => [
        'id'                => 'Report ID',
        'name'              => 'Reportname',
        'email'             => '<span class="hidden-xs">Report </span>Email',
        'role'              => 'Report Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Report Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Report</span> Access Level|<span class="hidden-xs">Report</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-reports-ph'   => 'Search Reports',
    ],

    'modals' => [
        'delete_report_message' => 'Are you sure you want to delete :report?',
    ],
];
