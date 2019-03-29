import React, {Component} from 'react';
import ReactDOM from 'react-dom';
const centrari = "marginLeft:auto";
const centrard = "marginRight:auto";
class ColumnCalendar extends Component{
    render(){
        return(    
            <div className="row">
                <div className="col s1"><span className="center-align">Domingo</span></div>
                <div className="col s2"><span className="center-align">Lunes</span></div>
                <div className="col s2"><span className="center-align">Martes</span></div>
                <div className="col s2"><span className="center-align">Miercoles</span></div>
                <div className="col s2"><span className="center-align">Jueves</span></div>
                <div className="col s2"><span className="center-align">Viernes</span></div>
                <div className="col s1"><span className="center-align">Sabado</span></div>
            </div>    
        );
    }
}
class Calendar extends Component{
    render(){
        return(
            <div style={[centrari,centrard]} >
                <ColumnCalendar></ColumnCalendar>
            </div>
        );
    }
}
ReactDOM.render(
        <Calendar />,
        document.getElementById("calendar")
    );