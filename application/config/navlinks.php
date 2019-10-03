<?php
    $config['active_navlinks'] = 0;
    $config['active_child_navlinks'] = 0;
    $config['admin_navlinks'] = [
        [
            'name'          => 'Dashboard',
            'link'          => base_url(''),
            'icon'          => 'home',
            'child'         => [],
            'active'        => false
        ],
        [
            'name'          => 'Peserta',
            'link'          => '',
            'icon'          => 'user-graduate',
            'child'         => [
                [
                    'name'      => 'Calon Peserta',
                    'link'      => base_url('participant/list'),
                    'active'    => false
                ],
                [
                    'name'      => 'Tambah Calon Peserta',
                    'link'      => base_url('participant/add'),
                    'active'    => false
                ],
            ],
            'active'        => false
        ],
        [
            'name'          => 'Manajemen Soal',
            'link'          => '',
            'icon'          => 'book',
            'child'         => [
                [
                    'name'      => 'List Soal',
                    'link'      => base_url('soal/list'),
                    'active'    => false
                ],
                [
                    'name'      => 'Upload Soal',
                    'link'      => base_url('soal/upload'),
                    'active'    => false
                ],
            ],
            'active'        => false
        ],
        [
            'name'          => 'Manajemen Ujian',
            'link'          => base_url('schedule'),
            'icon'          => 'calendar-alt',
            'child'         => [],
            'active'        => false
        ],
        [
            'name'          => 'Reporting',
            'link'          => base_url('reporting'),
            'icon'          => 'bullhorn',
            'child'         => [],
            'active'        => false
        ],
        [
            'name'          => 'Admin Management',
            'link'          => '',
            'icon'          => 'user-tie',
            'child'         => [
                [
                    'name'      => 'List Admin',
                    'link'      => base_url('admin_management/list'),
                    'active'    => false
                ],
                [
                    'name'      => 'Tambah Admin',
                    'link'      => base_url('admin_management/add'),
                    'active'    => false
                ],
                [
                    'name'      => 'Admin Roles',
                    'link'      => base_url('admin_management/roles'),
                    'active'    => false
                ],
            ],
            'active'        => false
        ],
    ];

    $config['participants_navlinks'] = [
        [
            'name'          => 'Dashboard',
            'link'          => base_url(''),
            'icon'          => 'home',
            'child'         => [],
            'active'        => false
        ],
        [
            'name'          => 'Profil',
            'link'          => base_url('participant/profile'),
            'icon'          => 'user-graduate',
            'child'         => [],
            'active'        => false
        ],
        [
            'name'          => 'Ujian',
            'link'          => base_url('participant/exam'),
            'icon'          => 'calendar-alt',
            'child'         => [],
            'active'        => false
        ],
    ];
?>
