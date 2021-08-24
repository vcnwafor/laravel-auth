<?php

return [

    // Titles
    'showing-all-services'     => 'Showing All Services',
    'services-menu-alt'        => 'Show Services Management Menu',
    'create-new-service'       => 'Create New Service',
    'show-deleted-services'    => 'Show Deleted Service',
    'editing-service'          => 'Editing Service :name',
    'showing-service'          => 'Showing Service :name',
    'showing-service-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created service! ',
    'updateSuccess'   => 'Successfully updated service! ',
    'deleteSuccess'   => 'Successfully deleted service! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Service Tab
    'viewProfile'            => 'View Profile',
    'editService'               => 'Edit Service',
    'deleteService'             => 'Delete Service',
    'deleteSheet'             => 'Delete Sheet',
    'servicesBackBtn'           => 'Back to Services',
    'servicesPanelTitle'        => 'Service Information',
    'labelServiceName'          => 'Servicename:',
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
    'servicesDeletedPanelTitle' => 'Deleted Service Information',
    'servicesBackDelBtn'        => 'Back to Deleted Services',

    'successRestore'    => 'Service successfully restored.',
    'successDestroy'    => 'Service record successfully destroyed.',
    'errorServiceNotFound' => 'Service not found.',

    'labelServiceLevel'  => 'Level',
    'labelServiceLevels' => 'Levels',

    'services-table' => [
        'caption'   => '{1} :servicescount service total|[2,*] :servicescount total services',
        'id'        => 'ID',
        'name'      => 'Name',
        'fname'     => 'First Name',
        'description'     => 'Description',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Service',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Service</span>',
        'delete-subservice'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Sub-Service</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Service</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Service</span>',
        'back-to-services' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Services</span>',
        'back-to-service'  => 'Back  <span class="hidden-xs">to Service</span>',
        'delete-service'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Service</span>',
        'edit-service'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Service</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Service',
        'back-services'    => 'Back to services',
        'email-service'    => 'Email :service',
        'submit-search' => 'Submit Services Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'serviceNameTaken'          => 'Servicename is taken',
        'serviceNameRequired'       => 'Servicename is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Service role is required.',
        'service-creation-success'  => 'Successfully created service!',
        'update-service-success'    => 'Successfully updated service!',
        'delete-success'         => 'Successfully deleted the service!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-service' => [
        'id'                => 'Service ID',
        'name'              => 'Servicename',
        'email'             => '<span class="hidden-xs">Service </span>Email',
        'role'              => 'Service Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Service Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Service</span> Access Level|<span class="hidden-xs">Service</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-services-ph'   => 'Search Services',
    ],

    'modals' => [
        'delete_service_message' => 'Are you sure you want to delete :service?',
    ],
];
