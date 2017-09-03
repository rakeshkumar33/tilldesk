import React, {Component} from 'react';
import ReactDOM from 'react-dom';


export default class Avatar extends Component {


    constructor(props)
    {

        super(props)


        this.state ={
            color: "#000",
            height: "300px",
            width: "300px",
            viewBox: "0 0 " + this.state.width + this.state.height
        }

    }
    render() {
        let inner = null;
        const {
            src,
            customClass,
            icon,
            color,
            height,
            width,
        } = this.props;

        if (src) {
            inner = <img src={src} className={customClass}/>
        } else {
            inner = (

                <svg height={this.state.height} width={this.state.width} className={customClass}>
                    <rect fill={this.state.color} x="0" y="0" height={this.state.height} width={this.state.width}></rect>
                    <text
                        fill="#ffffff"
                        fontSize="18"
                        textAnchor="middle"
                        x="18"
                        y="16">KH</text>
                </svg>
            );
        }

        return (
            <div className="avatar">{inner}</div>
        );
    }
}



if (document.getElementById('avatar')) {
    ReactDOM.render(<Avatar />, document.getElementById('avatar'));
}
