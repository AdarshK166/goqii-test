import { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import Userlist from "./components/Userlist";
import Add from "./components/Add";
import Edit from "./components/Edit";

function App() {
  return (
    <div className="container-fluid">
      <div className="row justify-content-center align-items-center vh-100">
        <div className="col-md-10">
          {" "}
          {/* Increase the column width */}
          <div className="card">
            <div className="card-body">
              <h1 className="card-title text-center mb-5">
                <b>CRUD operations</b>
              </h1>
              <BrowserRouter>
                <Routes>
                  <Route path="/" element={<Userlist />} />
                  <Route path="/add" element={<Add />} />
                  <Route path="/edit/:user_id" element={<Edit />} />
                </Routes>
              </BrowserRouter>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default App;
