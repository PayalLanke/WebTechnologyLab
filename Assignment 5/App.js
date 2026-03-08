import React, { useState } from "react";
import "./App.css";

function App() {

  const events = [
    {
      id:1,
      name:"AI Workshop",
      date:"15 March 2026",
      duration:"2 Days",
      venue:"Seminar Hall",
      club:"Computer Club",
      description:"Hands-on workshop on Artificial Intelligence tools.",
      image:"https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=800&q=60"
    },
    {
      id:2,
      name:"Hackathon",
      date:"20 March 2026",
      duration:"24 Hours",
      venue:"Lab 3",
      club:"Coding Club",
      description:"Coding competition for innovative ideas.",
      image:"https://images.unsplash.com/photo-1563206767-5b18f218e8de?auto=format&fit=crop&w=800&q=60"
    },
    {
      id:3,
      name:"Cultural Fest",
      date:"25 March 2026",
      duration:"3 Days",
      venue:"Auditorium",
      club:"Cultural Club",
      description:"Dance, music and cultural competitions.",
      image:"https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=800&q=60"
    },
    {
      id:4,
      name:"Robotics Seminar",
      date:"30 March 2026",
      duration:"1 Day",
      venue:"Seminar Hall 2",
      club:"Robotics Club",
      description:"Seminar on robotics and automation.",
      image:"https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?auto=format&fit=crop&w=800&q=60"
    }
  ];

  const [selectedEvent,setSelectedEvent] = useState(null);
  const [selectedEventName,setSelectedEventName] = useState("");

  const [name,setName] = useState("");
  const [email,setEmail] = useState("");
  const [college,setCollege] = useState("");
  const [studentType,setStudentType] = useState("");
  const [payment,setPayment] = useState("");

  const [registrations,setRegistrations] = useState([]);

  const handleSubmit = (e) => {

    e.preventDefault();

    if(selectedEventName===""){
      alert("Please select an event!");
      return;
    }

    const newRegistration = {
      id:Date.now(),
      name,
      email,
      college,
      studentType,
      event:selectedEventName,
      payment
    };

    setRegistrations([...registrations,newRegistration]);

    alert("Registration Done Successfully!");

    setName("");
    setEmail("");
    setCollege("");
    setStudentType("");
    setPayment("");
    setSelectedEventName("");
  };

  const deleteRegistration = (id) => {
    setRegistrations(registrations.filter((r)=>r.id!==id));
  };

  return (

    <div className="container">

      <h1 className="main-title">College Event Management System</h1>

      <h2 className="section-title">Upcoming Events</h2>

      <table className="event-table">

        <thead>
          <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Club</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          {events.map((event)=>(
            <tr key={event.id} className="event-row">

              <td>{event.name}</td>
              <td>{event.date}</td>
              <td>{event.club}</td>

              <td>
                <button
                  className="details-btn"
                  onClick={()=>setSelectedEvent(event)}
                >
                  View Details
                </button>
              </td>

            </tr>
          ))}

        </tbody>

      </table>


      {/* EVENT DETAILS POPUP */}

      {selectedEvent && (

        <div className="popup">

          <div className="popup-content">

            <span
              className="close-btn"
              onClick={()=>setSelectedEvent(null)}
            >
              ×
            </span>

            <img
              src={selectedEvent.image}
              alt="event"
              className="event-image"
            />

            <h2>{selectedEvent.name}</h2>

            <p><b>Date:</b> {selectedEvent.date}</p>
            <p><b>Duration:</b> {selectedEvent.duration}</p>
            <p><b>Venue:</b> {selectedEvent.venue}</p>
            <p><b>Club:</b> {selectedEvent.club}</p>
            <p><b>Description:</b> {selectedEvent.description}</p>

          </div>

        </div>

      )}


      {/* REGISTRATION FORM */}

      <div className="form-card">

        <h2>Event Registration</h2>

        <form onSubmit={handleSubmit}>

          <input
            type="text"
            placeholder="Enter Name"
            value={name}
            onChange={(e)=>setName(e.target.value)}
            required
          />

          <input
            type="email"
            placeholder="Enter Email"
            value={email}
            onChange={(e)=>setEmail(e.target.value)}
            required
          />

          <input
            type="text"
            placeholder="College Name"
            value={college}
            onChange={(e)=>setCollege(e.target.value)}
            required
          />

          {/* EVENT DROPDOWN */}

          <select
            value={selectedEventName}
            onChange={(e)=>setSelectedEventName(e.target.value)}
            required
          >

            <option value="">Select Event</option>

            {events.map((event)=>(
              <option key={event.id} value={event.name}>
                {event.name}
              </option>
            ))}

          </select>

          <select
            value={studentType}
            onChange={(e)=>setStudentType(e.target.value)}
            required
          >
            <option value="">Student Type</option>
            <option>Internal Student</option>
            <option>External Student</option>
          </select>

          <select
            value={payment}
            onChange={(e)=>setPayment(e.target.value)}
            required
          >
            <option value="">Payment Method</option>
            <option>UPI</option>
            <option>Card</option>
            <option>Cash</option>
          </select>

          <button className="register-btn">
            Register
          </button>

        </form>

      </div>


      {/* REGISTERED STUDENTS */}

      <h2 className="section-title">Registered Students</h2>

      <table className="event-table">

        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>College</th>
            <th>Event</th>
            <th>Payment</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          {registrations.map((reg)=>(
            <tr key={reg.id}>

              <td>{reg.name}</td>
              <td>{reg.email}</td>
              <td>{reg.college}</td>
              <td>{reg.event}</td>
              <td>{reg.payment}</td>

              <td>
                <button
                  className="delete-btn"
                  onClick={()=>deleteRegistration(reg.id)}
                >
                  Delete
                </button>
              </td>

            </tr>
          ))}

        </tbody>

      </table>

    </div>
  );
}

export default App;