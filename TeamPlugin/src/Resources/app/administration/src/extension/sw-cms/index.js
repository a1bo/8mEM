import './component/team-cms-element';
import './preview/team-cms-element-preview';

Shopware.Service('cmsService').registerCmsElement({
    name: 'team-cms-element',
    label: 'Team',
    component: 'team-cms-element',
    previewComponent: 'team-cms-element-preview',
    defaultConfig: {
        employees: {
            source: 'static',
            value: []
        }
    }
});

Shopware.Service('cmsService').registerCmsBlock({
    name: 'team-block',
    label: 'Team Block',
    category: 'text-image',
    component: 'team-cms-element',
    previewComponent: 'team-cms-element-preview'
});
