var Invits = function(config) {
    config = config || {};
    Invits.superclass.constructor.call(this, config);
};
Ext.extend(Invits,Ext.Component,{
    page:{}, window:{}, grid:{}, tree:{}, panel:{}, combo:{}, config:{}, view:{}
});
Ext.reg('invits', Invits);

Invits = new Invits();