import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

const Add = () => {
  let navigate = useNavigate();

  const [user, setUser] = useState({
    first_name: "",
    email: "",
    password: "",
    dob: "",
  });

  const handleChange = (event) => {
    const { name, value } = event.target;

    setUser({
      ...user,
      [name]: value,
    });
  };

  const handleSubmit = (event) => {
    event.preventDefault();

    fetch("http://localhost/reactapi/", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(user),
    })
      .then((response) => response.json())
      .then((data) => {
        navigate("/");
      });
  };

  return (
    <div className="card">
      <div className="card-header">
        <div className="row">
          <div className="col-md-6">Add User</div>
          <div className="col-md-6">
            <Link to="/" className="btn btn-success btn-sm float-end">
              View All
            </Link>
          </div>
        </div>
      </div>
      <div className="card-body">
        <div className="row">
          <div className="col-md-4">&nbsp;</div>
          <div className="col-md-4">
            <form method="POST" onSubmit={handleSubmit}>
              <div className="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" className="form-control" onChange={handleChange} />
              </div>
              <div className="mb-3">
                <label>Email</label>
                <input type="email" name="email" className="form-control" onChange={handleChange} />
              </div>
              <div className="mb-3">
                <label>Password</label>
                <input type="password" name="password" className="form-control" onChange={handleChange} />
              </div>
              <div className="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" className="form-control" onChange={handleChange} />
              </div>
              <div className="mb-3">
                <input type="submit" className="btn btn-primary" value="Add" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Add;
