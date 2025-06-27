Shopware.Service('cmsService').registerCmsElement({
    name: 'team-employee',
    label: 'Team Employee',
    component: 'cms-element-team-employee',
    configComponent: 'cms-element-team-employee-config',
    previewComponent: 'cms-element-team-employee-preview',
    defaultConfig: {
        employees: {
            source: 'static',
            value: []
        }
    }
});
