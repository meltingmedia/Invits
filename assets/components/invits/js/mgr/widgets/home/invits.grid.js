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
        },'->',{
            xtype: 'invits-combo-guestregistered'
            ,name: 'guest_registered'
            ,listeners: {
                select: {
                    fn: this.filterInvitations
                    ,scope: this
                }
            }
        }]
    });
    Invits.grid.Invits.superclass.constructor.call(this, config);
};
Ext.extend(Invits.grid.Invits, MODx.grid.Grid,{
    windows: {}

    /**
     * Generates the grid contextual menu
     */
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

    // Redirects to the invitation creation form
    ,createInvit: function(btn, e) {
        location.href = '?a=' + Invits.action + '&action=invit';
    }

    // Redirects to the invitation edition form
    ,updateInvit: function(btn, e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;
        location.href = '?a=' + Invits.action + '&action=invit&id=' + r.id;
    }

    // Deletes the selected invitation
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

    // Filters the grid results
    ,filterInvitations: function(cb, rec, ri) {
        this.getStore().baseParams['guest_registered'] = rec.data.v;
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('invits-grid-invits', Invits.grid.Invits);