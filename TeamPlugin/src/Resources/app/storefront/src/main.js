import TeamEmployeeSlider from './plugin/team-employee-slider';

const PluginManager = window.PluginManager;
PluginManager.register('TeamEmployeeSlider', TeamEmployeeSlider, '[data-team-employee-slider]');
