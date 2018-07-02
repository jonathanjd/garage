import React, { Component } from "react";

export default class YourSalesTab extends Component {
  render() {
    return (
      <div
        className="tab-pane fade show active"
        id="yourSale"
        role="tabpanel"
        aria-labelledby="your-sales"
      >
        <div className="row">
          <div className="col-md-12">
            <div className="card mt-4">
              <div className="card-body">
                <h3>Your Sales</h3>
                <p>You do not have any sales scheduled.</p>
                <button className="btn btn-success">Add Sale</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
