import React, { Component } from "react";

export default class AccountSettings extends Component {
  render() {
    return (
      <div
        className="tab-pane fade"
        id="accountSettings"
        role="tabpanel"
        aria-labelledby="account-setting"
      >
        <div className="row">
          <div className="col-md-12">
            <div className="card mt-4">
              <div className="card-body">
                <h3>Change Your Password</h3>
                <form action="">
                  <div className="form-group">
                    <label htmlFor="">New Password</label>
                    <input type="text" className="form-control" />
                  </div>
                </form>
                <button className="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
