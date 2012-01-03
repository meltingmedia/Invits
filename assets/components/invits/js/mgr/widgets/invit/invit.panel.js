/**
 * @class Invits.panel.Invit
 * @extends MODx.FormPanel
 * @param {Object} config
 * @xtype invits-panel-invit
 */
Invits.panel.Invit = function(config) {
    config = config || {record:{}};
    config.record = config.record || {};
    console.log(config.record);

    var leftColumn = [];
    leftColumn.push({
        xtype: 'hidden'
        ,fieldLabel: _('id')
        ,name: 'id'
        ,value: config.record.id || ''
        ,submitValue: true
    },{
        xtype: 'textfield'
        ,fieldLabel: _('invits.invit_guest_email')
        ,name: 'guest_email'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('invits.invit_guest_name')
        ,name: 'guest_name'
    });

    var rightColumn = [];
    rightColumn.push({
        xtype: 'statictextfield'
        ,fieldLabel: _('invits.invit_hash')
        ,name: 'hash'
    },{
        xtype: 'statictextfield'
        ,fieldLabel: _('invits.invit_createdon')
        ,name: 'date'
    },{
        xtype: 'statictextfield'
        //,fieldLabel: ''
        //,boxLabel: _('invits.invit_guest_registered')
        ,fieldLabel: _('invits.invit_guest_registered')
        ,name: 'guest_registered'
    });

    var tabs = [];
    // Create/edit tab
    tabs.push({
        title: _('invits.invit_createedit')
        ,id: 'invits-invit-create-edit-tab'
        ,cls: 'modx-resource-tab'
        ,layout: 'form'
        ,bodyCssClass: 'main-wrapper'
        ,autoHeight: true
        ,defaults: {
            border: false
        }
        ,items: [{
            layout:'column'
            ,border: false
            ,anchor: '100%'
            ,defaults: {
                labelSeparator: ''
                ,labelAlign: 'top'
                ,border: false
                ,msgTarget: 'under'
            }
            ,items:[{
                columnWidth: .67
                ,layout: 'form'
                ,defaults: {
                    msgTarget: 'under'
                    ,anchor: '100%'
                }
                ,items: leftColumn
            },{
                columnWidth: .33
                ,layout: 'form'
                ,labelWidth: 0
                ,border: false
                ,style: 'margin-right: 0'
                ,defaults: {
                    msgTarget: 'under'
                    ,anchor: '100%'
                }
                ,items: rightColumn
            }]
        }]
    });

    var items = [];
    items.push({
        html: '<h2>'+ (config.record.id ? _('invits.invit_edit') : _('invits.invit_create')) +': '+ (config.record.id ? config.record.id : '') +' </h2>'
        ,border: false
        ,id: 'invits-ad-header'
        ,cls: 'modx-page-header'
        ,forceLayout: true
        ,anchor: '100%'
    });
    items.push(MODx.getPageStructure(
        tabs
    ));

    Ext.apply(config, {
        id: 'invits-panel-invit'
        ,cls: 'container'
        ,layout: 'form'
        ,url: Invits.config.connector_url
        ,baseParams: {}
        ,items: items
        ,listeners: {
            setup: {
                fn: this.setup
                ,scope: this
            }
            ,beforeSubmit: {
                fn: this.beforeSubmit
                ,scope: this
            }
            ,success: {
                fn: this.success
                ,scope: this
            }
        }

    });
    Invits.panel.Invit.superclass.constructor.call(this, config);
};
Ext.extend(Invits.panel.Invit, MODx.FormPanel, {
    initialized: false

    /**
     * Load the values if available
     */
    ,setup: function() {
        if (!this.initialized) {
            this.getForm().setValues(this.config.record);
        }
        this.fireEvent('ready');
        this.initialized = true;
    }
    ,beforeSubmit: function(o) {}

    /**
     * Redirects to the proper page after successful submit
     */
    ,success: function(o) {
        switch (this.getForm().baseParams.action) {
            case 'mgr/invit/remove':
                location.href = '?a='+Invits.action;
                break;
            default:
                //location.href = location.href; // @todo: apply modifications instead of reloading the page
                location.href = '?a=' + Invits.action + '&action=invit&id=' + o.result.object.id;
                break;
        }
    }
});
Ext.reg('invits-panel-invit', Invits.panel.Invit);
