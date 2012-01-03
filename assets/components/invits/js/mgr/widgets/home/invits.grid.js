/**
 * @class Invits.grid.Invits
 * @extends MODx.grid.Grid
 * @param {Object} config
 * @xtype invits-grid-invits
 */
Invits.grid.Invits = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        id: 'invits-grid-invits'
        ,url: Invits.config.connector_url
        ,baseParams: {
            action: 'mgr/invit/getlist'
        }
        ,fields: ['id', 'sender', 'sender_id', 'guest_email', 'guest_name', 'guest_registered', 'hash']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('invits.invit_sender_name')
            ,dataIndex: 'sender'
        },{
            header: _('invits.invit_guest_email')
            ,dataIndex: 'guest_email'
        },{
            header: _('invits.invit_hash')
            ,dataIndex: 'hash'
        },{
            header: _('invits.invit_guest_registered')
            ,dataIndex: 'guest_registered'
        }]
        ,tbar: [{
            text: _('invits.invit_create')
            ,handler: this.createInvit
            ,scope: this
        }]
    });
    Invits.grid.Invits.superclass.constructor.call(this, config);
};
Ext.extend(Invits.grid.Invits, MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('invits.invit_update')
            ,handler: this.updateInvit
        });
        m.push('-');
        m.push({
            text: _('invits.invit_remove')
            ,handler: this.removeInvit
        });
        this.addContextMenuItem(m);
    }

    ,createInvit: function(btn, e) {
        if (!this.windows.createInvit) {
            this.windows.createInvit = MODx.load({
                xtype: 'invits-window-invit-create'
                ,listeners: {
                    success: {
                        fn: function() {
                            this.refresh();
                        }
                        ,scope: this
                    }
                }
            });
        }
        this.windows.createInvit.fp.getForm().reset();
        this.windows.createInvit.show(e.target);
    }

    ,updateInvit: function(btn, e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;
        location.href = '?a=' + Invits.action + '&action=invit&id=' + r.id;
    }
    
    ,removeInvit: function(btn, e) {
        if (!this.menu.record) return false;

        MODx.msg.confirm({
            title: _('invits.invit_remove')
            ,text: _('invits.invit_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/invit/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {
                    fn: function(r) {
                        this.refresh();
                    }
                    ,scope: this
                }
            }
        });
    }
});
Ext.reg('invits-grid-invits', Invits.grid.Invits);




Invits.window.CreateInvit = function(config) {
    config = config || {};
    this.ident = config.ident || 'icinvit'+Ext.id();

    Ext.applyIf(config, {
        title: _('invits.invit_create')
        ,id: this.ident
        ,height: 150
        ,width: 475
        ,url: Invits.config.connector_url
        ,action: 'mgr/invit/create'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('invits.invit_guest_email')
            ,name: 'guest_email'
            ,id: 'invits-'+this.ident+'-email'
            ,width: 300
        },{
            xtype: 'textfield'
            ,fieldLabel: _('invits.invit_guest_name')
            ,name: 'guest_name'
            ,id: 'invits-'+this.ident+'-name'
            ,width: 300
        }]
    });
    Invits.window.CreateInvit.superclass.constructor.call(this, config);
};
Ext.extend(Invits.window.CreateInvit, MODx.Window);
Ext.reg('invits-window-invit-create', Invits.window.CreateInvit);


Invits.window.UpdateInvit = function(config) {
    config = config || {};
    this.ident = config.ident || 'iuinvit'+Ext.id();

    Ext.applyIf(config, {
        title: _('invits.invit_update')
        ,id: this.ident
        ,height: 150
        ,width: 475
        ,url: Invits.config.connector_url
        ,action: 'mgr/invit/update'
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
            ,id: 'invits-'+this.ident+'-id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('name')
            ,name: 'name'
            ,id: 'invits-'+this.ident+'-name'
            ,width: 300
        },{
            xtype: 'textarea'
            ,fieldLabel: _('description')
            ,name: 'description'
            ,id: 'invits-'+this.ident+'-description'
            ,width: 300
        }]
    });
    Invits.window.UpdateInvit.superclass.constructor.call(this, config);
};
Ext.extend(Invits.window.UpdateInvit, MODx.Window);
Ext.reg('invits-window-invit-update', Invits.window.UpdateInvit);