class Table {
    private _table: string;
    private _tbody : string;
    private _thead : string;
    public constructor(...header: string[]) {
        this._table = "<table><thead>%h</thead><tbody>%b</tbody></table>";
        this._tbody = "";
        this._thead = "";
        this.initializeTable(header);
    }
    private initializeTable( header: string[]) {
        for (let i = 0; i < header.length; i++) {
            this._thead += "<th>" + header[i] + "</th>";
        }
    }
    public getTable() {
        let table : string = this._table;
        table = table.replace("%h",this._thead);
        table = table.replace("%b",this._tbody);
        return table;
    }
    public deleteRowByCellElement(cellElement : string, firstOnly : boolean  = true ) {
        let rows : RegExpMatchArray = this._tbody.match(/<tr>.+?<\/tr>/mg);
        let stopRemoving : boolean = false;
        this._tbody = "";
        for(let i = 0 ; i < rows.length ; i++) {
            if( rows[i].search("<td>"+cellElement+"</td>") === -1 || stopRemoving) { //Reviso si el elemento no esta y cargo
                this._tbody += rows[i];
            }
            else if(firstOnly) { //Si el elemento esta en las filas cambio y solo se pide eliminar uno, cambio stopremoving a true para que entre siempre al if anterior
                stopRemoving = true;
            }
        }
    }
    public replaceThead( ...header: string[]) {
        this._thead = "";
        this.initializeTable(header);
    }
    public addRow(...body: string[]) {
        this._tbody += "<tr>";
        for (let i = 0; i < body.length; i++) {
            this._tbody += "<td>" + body[i] + "</td>";
        }
        this._tbody += "</tr>";
        return this.getTable();
    }
}