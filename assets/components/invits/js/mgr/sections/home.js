Ext.onReady(function() {
    MODx.load({ xtype: 'invits-page-home'});
});

/**
 * @class Invits.page.Home
 * @extends MODx.Component
 * @param [Object} config
 * @xtype invits-page-home
 */
Invits.page.Home = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        components: [{
            xtype: 'invits-panel-home'
            ,renderTo: 'invits-panel-home-div'
        }]
    }); 
    Invits.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(Invits.page.Home, MODx.Component);
Ext.reg('invits-page-home', Invits.page.Home);