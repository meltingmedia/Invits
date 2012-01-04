/**
 * @class Invits.combo.guest_registered
 * @extends Ext.form.ComboBox
 * @param {Object} config
 * @xtype invits-combo-guestregistered
 */
Invits.combo.guest_registered = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        store: new Ext.data.SimpleStore({
            fields: ['v', 'd']
            ,data: [
                ['', _('invits.invit_guest_registered_all')]
                ,['1', _('invits.invit_guest_registered_yes')]
                ,['0', _('invits.invit_guest_registered_no')]
            ]
        })
        ,displayField: 'd'
        ,valueField: 'v'
        ,value: ''
        ,mode: 'local'
        ,name: 'guest_registered'
        ,hiddenName: 'guest_registered'
        ,triggerAction: 'all'
        ,editable: false
        ,selectOnFocus: false
        ,listWidth: 0
    });
    Invits.combo.guest_registered.superclass.constructor.call(this, config);
};
Ext.extend(Invits.combo.guest_registered, Ext.form.ComboBox);
Ext.reg('invits-combo-guestregistered', Invits.combo.guest_registered);