import { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import Userlist from "./components/Userlist";
import Add from "./components/Add";
import Edit from "./components/Edit";

function App() {
  return (
    <div className="container">
      <h1 className="mt-5 mb-5 text-center">
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
  );
}

export default App;
