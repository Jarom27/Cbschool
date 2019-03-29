import React, {Component} from 'react';
import ReactDOM from 'react-dom';

/**
*	Here goes all magic
*/
const imagen = "/CB/Resources/images/1.jpg";
const width = "100%";
const height = "400px";
class About extends Component {
  	render() {
        const style={
            marginTop:"20px",
        };
        
	    return (
            <div>
                <h1 style={style} className="center-align">Bienvendos a Cobach Plantel Obregon 3</h1>
                <img src={imagen} width={width} height={height}></img>
                <p>Un colegio con grandes expectativas</p>
            </div>
	    	
	    );
  }
}


ReactDOM.render(
	<About/>, 
	document.getElementById('about')
);
