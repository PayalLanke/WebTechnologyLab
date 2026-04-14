function openModal(){
 document.getElementById("modal").style.display="block";
}

function closeModal(){
 document.getElementById("modal").style.display="none";
}

function searchTable(){
 let input=document.getElementById("search").value.toLowerCase();
 let rows=document.querySelectorAll("#table tr");

 rows.forEach((row,i)=>{
  if(i==0) return;
  row.style.display=row.innerText.toLowerCase().includes(input)?"":"none";
 });
}