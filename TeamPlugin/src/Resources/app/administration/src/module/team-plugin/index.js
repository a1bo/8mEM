import './page/team-list';

Shopware.Module.register('team-plugin', {
    type: 'plugin',
    name: 'TeamPlugin',
    title: 'Team',
    description: 'Manage employees',
    color: '#9AA8B5',
    icon: 'default-avatar-single',
    routes: {
        list: {
            component: 'team-list',
            path: 'list'
        }
    },
    navigation: [
        {
            label: 'Team',
            color: '#9AA8B5',
            path: 'team.plugin.list',
            icon: 'default-avatar-single',
            parent: 'sw-content'
        }
    ]
});
