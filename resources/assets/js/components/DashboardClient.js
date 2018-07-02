import React, { Component } from "react";
import ReactDOM from "react-dom";
import YourSalesTab from "./TabsCliente/YourSalesTab";
import AccountSettings from "./TabsCliente/AccountSettings";

export default class DashBoardClient extends Component {
  render() {
    return (
      <div>
        <ul className="nav nav-tabs" id="myTab" role="tablist">
          <li className="nav-item">
            <a
              className="nav-link active"
              id="your-sales"
              data-toggle="tab"
              href="#yourSale"
              role="tab"
              aria-controls="yourSale"
              aria-selected="true"
            >
              Your Sales
            </a>
          </li>
          <li className="nav-item">
            <a
              className="nav-link"
              id="account-setting"
              data-toggle="tab"
              href="#accountSettings"
              role="tab"
              aria-controls="accountSettings"
              aria-selected="false"
            >
              Account Settings
            </a>
          </li>
        </ul>
        <div className="tab-content" id="myTabContent">
          <YourSalesTab />
          <AccountSettings />
        </div>
      </div>
    );
  }
}

if (document.getElementById("dashBoardClient")) {
  ReactDOM.render(
    <DashBoardClient />,
    document.getElementById("dashBoardClient")
  );
}
