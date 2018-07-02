import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class YardSale extends Component {
  render() {
    return (
      <div>
        <h3>YardSale Component</h3>
      </div>
    );
  }
}

if (document.getElementById("yardSale")) {
  ReactDOM.render(<YardSale />, document.getElementById("yardSale"));
}
