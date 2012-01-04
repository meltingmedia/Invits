/**
 * @class Invits.page.Invit
 * @extends MODx.Component
 * @param {Object} config
 * @xtype invits-page-invit
 */
Invits.page.Invit = function(config) {
    config = config || {record:{}};
    config.record = config.record || {};

    Ext.applyIf(config, {
        formpanel: 'invits-panel-invit'
        ,url: Invits.config.connector_url
        ,buttons: this.getButtons(config)
        ,components: [{
            xtype: 'invits-panel-invit'
            ,renderTo: 'invits-panel-invit-div'
            ,record: config.record || {}
        }]
    }); 
    Invits.page.Invit.superclass.constructor.call(this, config);
};
Ext.extend(Invits.page.Invit, MODx.Component, {
    getButtons: function(cfg) {
        var btns = [];
        btns.push({
            text: _('invits.invit_new')
            ,id: 'invits-btn-new'
            ,handler: this.createInvit
            ,disabled: cfg.record.id ? false : true
            ,hidden: cfg.record.id ? false : true
        },{
            text: _('invits.invit_save')
            ,id: 'invits-btn-save'
            ,process: cfg.record.id ? 'mgr/invit/update' : 'mgr/invit/create'
            ,method: 'remote'
            ,keys: [{
                key: MODx.config.keymap_save || 's'
                ,ctrl: true
            }]
        },'-',{
            text: _('invits.invit_back')
            ,id: 'invits-btn-back'
            ,handler: function() {
                location.href = '?a=' + Invits.action
            }
            ,scope: this
        });
        return btns;
    }

    // Redirects to the invitation creation form
    ,createInvit: function(btn, e) {
        location.href = '?a=' + Invits.action + '&action=invit';
    }
});
Ext.reg('invits-page-invit', Invits.page.Invit);