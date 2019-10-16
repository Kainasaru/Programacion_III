class Ajax {
    private _xhttp : XMLHttpRequest;
    private static DONE : number;
    private static OK : number;
    private _async : boolean;
    private _onSucess : Function;
    private _onFail : Function;
    public constructor( async:boolean = true, onSucess? : Function, onFail? : Function) {
        this._async = async;
        this._onSucess = onSucess;
        this._onFail = onFail;
        this._xhttp = new XMLHttpRequest();
        Ajax.DONE = 4;
        Ajax.OK = 200;
    }

    public set async(async : boolean) {
        
        this._async = async;
    }
    public get async() {
        return this._async;
    }
    public set onSucess(onSucess : Function) {
        this._onSucess = onSucess;
    }
    public set onFail(onFail : Function) {
        this.onFail = onFail;
    }

    public GET(url : string ) {
        this._xhttp.onreadystatechange = () => {
            if( this._xhttp.readyState == Ajax.DONE) {
                if(this._xhttp.status == Ajax.OK && this._onSucess !== undefined) {
                    this._onSucess(this._xhttp.responseText);
                }
                else if( this._onFail !== undefined ){
                    this._onFail(this._xhttp.status);
                }
            }
        };
        this._xhttp.open("GET",url,this.async);
        this._xhttp.send();
    }
    public POST(url : string, params : string ) {
        this._xhttp.onreadystatechange = () => {
            if( this._xhttp.readyState == Ajax.DONE) {
                if(this._xhttp.status == Ajax.OK  && this._onSucess !== undefined) {
                    this._onSucess(this._xhttp.responseText);
                }
                else if( this._onFail !== undefined ){
                    this._onFail(this._xhttp.status);
                }
            }
        };
        this._xhttp.open("POST",url,this.async);
        this._xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        this._xhttp.send(params);
    }
    public Binary( url : string, commonParams : string , nameOfFileParams : string[] , files : FileList  ) {
        let form = new FormData();
        for(let i = 0 ; i < commonParams.split("&").length ; i++) {
            let param : string[] = ((commonParams.split("&"))[i]).split("=");
            form.append(param[0],param[1]);
        }
        for(let i = 0 ; i < nameOfFileParams.length ; i++) {
            form.append(nameOfFileParams[i],files[i]);
        }
        this._xhttp.onreadystatechange = () => {
            if( this._xhttp.readyState == Ajax.DONE) {
                if(this._xhttp.status == Ajax.OK  && this._onSucess !== undefined) {
                    this._onSucess(this._xhttp.responseText);
                }
                else if( this._onFail !== undefined ){
                    this._onFail(this._xhttp.status);
                }
            }
        };
        this._xhttp.open("POST",url,this.async);
        this._xhttp.setRequestHeader("enctype","multipart/form-data");
        this._xhttp.send(form);
    }
}