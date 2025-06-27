import './page/team-employee-list';
import './page/team-employee-detail';
import './component/team-employee-media-form';

import enGB from './snippet/en-GB.json';
import deDE from './snippet/de-DE.json';

const { Module } = Shopware;

Module.register('team-employee', {
    type: 'plugin',
    name: 'team-employee',
    title: 'team-employee.general.mainMenuItemGeneral',
    description: 'team-employee.general.description',
    color: '#ff3e6d',
    icon: 'default-action-settings',

    snippets: {
        'en-GB': enGB,
        'de-DE': deDE
    },

    routes: {
        list: {
            component: 'team-plugin-employee-list',
            path: 'list'
        },
        detail: {
            component: 'team-plugin-employee-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'team.employee.list'
            }
        },
        create: {
            component: 'team-plugin-employee-detail',
            path: 'create',
            meta: {
                parentPath: 'team.employee.list'
            }
        },
    },

    navigation: [{
        label: 'team-employee.general.mainMenuItemGeneral',
        color: '#ff3e6d',
        path: 'team.employee.list',
        icon: 'default-action-settings',
        position: 100,
        parent: 'sw-content',
    }]
});
