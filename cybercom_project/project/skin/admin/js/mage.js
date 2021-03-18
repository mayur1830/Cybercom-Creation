var Base=function(){

}
Base.prototype={
    url:null,
    param:{},
    method:'post',
    setUrl:function(url){
        this.url=url
        return this
    },
    getUrl:function(){
        return this.url
    },
    setMethod:function(method){
        this.method=method
        return this
    },
    getMethod:function(){
        return this.method
    },
    setParam:function(params){
        this.params=params
        return this
    },
    getParam:function(key){
        if(typeof key == 'undefined'){
            return this.params
        }
        return this.param[key];
    },
    resetParam:function () {
        this.param={};
        return this;
    },
    addParam:function(key,value) {
        this.param[key]=value;
        return this;
    },
    removeParam:function(key) {
        if(this.param[key] != 'undefined'){
            delete this.param[key];
        }
        return this
    },
    load:function () {
        $.ajax({
            method:this.getMethod(),
            url:this.getUrl(),
            data:this.getParam(),
            success: function(response){
                $.each(response.element,function (i,element) {
                    $(element.selector).html(element.html)
                })
            //     $(response.element.selector).html(response.element.html);
            //     console.log(response.status)
            //    console.log(response);
            }
        })
        
    }
}
