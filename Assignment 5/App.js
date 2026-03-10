import React, { useState } from "react";
import "./App.css";

function App() {

const [page,setPage] = useState("home");
const [eventType,setEventType] = useState("");
const [selectedEvent,setSelectedEvent] = useState(null);

const [registrations,setRegistrations] = useState([]);

const [name,setName] = useState("");
const [email,setEmail] = useState("");
const [phone,setPhone] = useState("");
const [college,setCollege] = useState("");
const [branch,setBranch] = useState("");
const [year,setYear] = useState("");
const [studentType,setStudentType] = useState("");
const [payment,setPayment] = useState("");

const upcomingEvents=[

{
id:1,
name:"AI Workshop",
date:"15 March 2026",
details:"Hands-on workshop on Artificial Intelligence tools.",
image:"https://images.unsplash.com/photo-1677442136019-21780ecad995"
},

{
id:2,
name:"Hackathon",
date:"20 March 2026",
details:"24 hour coding competition for innovative ideas.",
image:"https://images.unsplash.com/photo-1563206767-5b18f218e8de"
},

{
id:3,
name:"Cultural Fest",
date:"25 March 2026",
details:"Dance music drama competitions.",
image:"https://images.unsplash.com/photo-1501281668745-f7f57925c3b4"
},

{
id:4,
name:"Robotics Seminar",
date:"30 March 2026",
details:"Seminar on robotics automation technology.",
image:"https://images.unsplash.com/photo-1581090464777-f3220bbe1b8b"
}

];

const pastEvents=[

{
id:1,
name:"Web Development Bootcamp",
date:"Jan 2025",
image:"https://images.unsplash.com/photo-1498050108023-c5249f4df085",
details:"3 day workshop on HTML CSS React."
},

{
id:2,
name:"Coding Competition",
date:"Dec 2024",
image:"https://images.unsplash.com/photo-1518770660439-4636190af475",
details:"Competitive programming contest."
}

];

const handleSubmit=(e)=>{

e.preventDefault();

const newRegistration={

id:Date.now(),
name,
email,
phone,
college,
branch,
year,
studentType,
event:selectedEvent.name,
payment

};

setRegistrations([...registrations,newRegistration]);

alert("Registration Successful");

setName("");
setEmail("");
setPhone("");
setCollege("");
setBranch("");
setYear("");
setStudentType("");
setPayment("");

setPage("home");

};

const deleteRegistration=(id)=>{
setRegistrations(registrations.filter(r=>r.id!==id));
};

return(

<div className="container">

<h1 className="title">College Event Management System</h1>

<div className="navbar">
<button onClick={()=>setPage("home")}>Home</button>
<button onClick={()=>setPage("students")}>Registered Students</button>
<button onClick={()=>setPage("clubs")}>Clubs</button>
</div>

{/* HOME */}

{page==="home" &&(

<div className="home">

<h2>Welcome to College Event Portal</h2>

<p>
Explore technical, cultural and innovation events organized by student clubs.
</p>

<div className="hero-buttons">

<button className="btn1"
onClick={()=>{setEventType("upcoming");setPage("events");}}>
Upcoming Events
</button>

<button className="btn2"
onClick={()=>{setEventType("past");setPage("events");}}>
Past Events
</button>

</div>

</div>

)}

{/* EVENTS */}

{page==="events" &&(

<div>

<h2 className="section">
{eventType==="upcoming"?"Upcoming Events":"Past Events"}
</h2>

<div className="event-grid">

{(eventType==="upcoming"?upcomingEvents:pastEvents).map(event=>(

<div className="event-card" key={event.id}>

<img src={event.image} alt="event"/>

<div className="card-body">

<h3>{event.name}</h3>
<p>{event.date}</p>

<button onClick={()=>{

setSelectedEvent(event);
setPage("details");

}}>
View Details
</button>

</div>

</div>

))}

</div>

</div>

)}

{/* EVENT DETAILS */}

{page==="details" && selectedEvent &&(

<div className="details-card">

<img src={selectedEvent.image} alt="event"/>

<h2>{selectedEvent.name}</h2>

<p>{selectedEvent.details}</p>

<p><b>Date:</b> {selectedEvent.date}</p>

{eventType==="upcoming" &&(

<button onClick={()=>setPage("register")}>
Register
</button>

)}

</div>

)}

{/* REGISTRATION */}

{page==="register" &&(

<div className="form-box">

<h2>Event Registration</h2>

<form onSubmit={handleSubmit}>

<input type="text" placeholder="Full Name"
value={name}
onChange={(e)=>setName(e.target.value)}
required/>

<input type="email" placeholder="Email"
value={email}
onChange={(e)=>setEmail(e.target.value)}
required/>

<input type="text" placeholder="Phone Number"
value={phone}
onChange={(e)=>setPhone(e.target.value)}
required/>

<input type="text" placeholder="College Name"
value={college}
onChange={(e)=>setCollege(e.target.value)}
required/>

<input type="text" placeholder="Branch"
value={branch}
onChange={(e)=>setBranch(e.target.value)}
required/>

<select value={year}
onChange={(e)=>setYear(e.target.value)}
required>

<option value="">Select Year</option>
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
<option>4th Year</option>

</select>

<select value={studentType}
onChange={(e)=>setStudentType(e.target.value)}
required>

<option value="">Student Type</option>
<option>Internal Student</option>
<option>External Student</option>

</select>

<select value={payment}
onChange={(e)=>setPayment(e.target.value)}
required>

<option value="">Payment Method</option>
<option>UPI</option>
<option>Debit/Credit Card</option>
<option>Cash</option>

</select>

<button className="register-btn">Register</button>

</form>

</div>

)}

{/* STUDENTS */}

{page==="students" &&(

<div>

<h2 className="section">Registered Students</h2>

<table className="table">

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

{registrations.map(reg=>(

<tr key={reg.id}>

<td>{reg.name}</td>
<td>{reg.email}</td>
<td>{reg.college}</td>
<td>{reg.event}</td>
<td>{reg.payment}</td>

<td>

<button
className="delete-btn"
onClick={()=>deleteRegistration(reg.id)}>
Delete
</button>

</td>

</tr>

))}

</tbody>

</table>

</div>

)}

{/* CLUBS */}

{page==="clubs" &&(

<div>

<h2 className="section">College Clubs</h2>

<div className="club-grid">

<div className="flip-card">
<div className="flip-inner">

<div className="flip-front">
<img src="https://images.unsplash.com/photo-1518770660439-4636190af475" alt="club"/>
<h3>Computer Club</h3>
</div>

<div className="flip-back">
<h3>Computer Club</h3>
<p>Established: 2015</p>
<p>Members: 60</p>
<p>Budget: ₹1,50,000</p>
<p>Events: AI Workshop</p>
</div>

</div>
</div>

<div className="flip-card">
<div className="flip-inner">

<div className="flip-front">
<img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" alt="club"/>
<h3>Coding Club</h3>
</div>

<div className="flip-back">
<h3>Coding Club</h3>
<p>Established: 2016</p>
<p>Members: 50</p>
<p>Budget: ₹1,20,000</p>
<p>Events: Hackathons</p>
</div>

</div>
</div>

<div className="flip-card">
<div className="flip-inner">

<div className="flip-front">
<img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4" alt="club"/>
<h3>Cultural Club</h3>
</div>

<div className="flip-back">
<h3>Cultural Club</h3>
<p>Established: 2010</p>
<p>Members: 80</p>
<p>Budget: ₹2,00,000</p>
<p>Events: Cultural Fest</p>
</div>

</div>
</div>

<div className="flip-card">
<div className="flip-inner">

<div className="flip-front">
<img src="https://images.unsplash.com/photo-1581090464777-f3220bbe1b8b" alt="club"/>
<h3>Robotics Club</h3>
</div>

<div className="flip-back">
<h3>Robotics Club</h3>
<p>Established: 2018</p>
<p>Members: 40</p>
<p>Budget: ₹1,80,000</p>
<p>Events: Robotics Workshop</p>
</div>

</div>
</div>

</div>

</div>

)}

</div>

);

}

export default App;