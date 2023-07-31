const totalPrice = document.getElementById("total-price")
const selectedSeat = document.getElementById('selected-seat')
const seats = document.querySelectorAll(".seat:not(.booked)")
let selectedSeatList = []
let price = 0

seats.forEach(seat=>{
    seat.addEventListener('click',()=>{
        seat.classList.toggle('selected')
        seatData = seat.id.split("-")
        const seatKey = seatData[0]
        const seatPrice = Number(seatData[1])
        if(seat.classList.value.includes('selected')){
           selectedSeatList = [...selectedSeatList,seatKey];
           price +=seatPrice
        }else{
           selectedSeatList = selectedSeatList.filter((item)=> item!=seatKey)
           price -=seatPrice
        }
        selectedSeat.innerText = selectedSeatList.join(",")
        totalPrice.innerText = `${price} VND`
    })
})

function postData(idSchedule,idRoom){
   if(selectedSeatList.length == 0){
    alert("Your hadn't selected any seat");
   }else{
    // const url = "http://localhost/duan1/views/client/index.php?act=movie-checkout"
    // const data = JSON.stringify({selectedSeat:selectedSeat,idSchedule:idSchedule,idRoom:idRoom})
    // fetch(url,{
    //     method: "POST",
    //     header:{
    //         'Accept': 'application/json, text/plain, */*',
    //         'Content-Type': 'application/json'
    //     },
    //     body:  data,
    // })
    // .then()
    location.href =`http://localhost/duan1/views/client/index.php?act=movie-checkout`
    +`&s=${selectedSeatList}`
    +`&sh=${idSchedule}`
    +`&r=${idRoom}`
    +`&total=${price}`
   }
}