import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class SaleManage extends Component {
  render() {
    return (
      <div>
        <h3>SaleManage Components</h3>
      </div>
    );
  }
}

if (document.getElementById("saleManage")) {
  ReactDOM.render(<SaleManage />, document.getElementById("saleManage"));
}
