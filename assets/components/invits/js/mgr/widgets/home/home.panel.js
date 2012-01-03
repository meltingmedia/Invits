/**
 * @class Invits.panel.Home
 * @extends MODx.Panel
 * @param {Object} config
 * @xtype invits-panel-home
 */
Invits.panel.Home = function(config) {
    config = config || {};

    Ext.apply(config, {
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('invits')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: {
                border: false
                ,autoHeight: true
            }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('invits.invits')
                ,items: [{
                    html: '<p>'+_('invits.intro_msg')+'</p>'
                    ,border: false
                    ,cls: 'panel-desc'
                },{
                    xtype: 'invits-grid-invits'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    Invits.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(Invits.panel.Home, MODx.Panel);
Ext.reg('invits-panel-home', Invits.panel.Home);
