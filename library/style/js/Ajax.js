class Ajax {
    //构造方法
    constructor() {
        //创建XMLHttpRequest对象
        this.xhr = new XMLHttpRequest();
        //监听请求，等到请求已完成，再去处理响应数据
        this.xhr.onreadystatechange = () => {
            if (this.xhr.readyState == 4 && this.xhr.status == 200) {
                let response = this.xhr.responseText;
                if (this.type == "json") {
                    //将json转变为对象
                    response = JSON.parse(response);
                    }
                    this.callback(response);
                }
            }

        }
        //get提交
        get(url, parameters, callback, type = 'text')
        {
            let data = this.parseParameters(parameters);
            if (data.length > 0) {
                url += "?" + data;
            }
            this.type = type;
            this.callback = callback;
            //准备发送工作
            this.xhr.open("GET", url, true);
            //发送请求
            this.xhr.send();
        }
        //post提交
        post(url, parameters, callback, type = 'text')
        {
            let data = this.parseParameters(parameters);
            this.type = type;
            this.callback = callback;
            //准备发送
            this.xhr.open("POST", url, true);
            this.xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //发送请求
            this.xhr.send(data);
        }

        //拼装字符串
        parseParameters(parameters)
        {
            let buildStr = "";
            for (let key in parameters) {
                let str = key + "=" + parameters[key];
                buildStr += str + "&";
            }
            return buildStr.substring(0, buildStr.length - 1);
        }

}
let ajax = new Ajax();