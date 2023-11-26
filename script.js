let dayBox = document.getElementById("day-box");
let hrBox = document.getElementById("hr-box");
let minBox = document.getElementById("min-box");
let secBox = document.getElementById("sec-box");
//Format: Date(year, month, day, hour, minute)
//Year is counter from 0 to 11
let endDate = new Date(2023, 11, 20, 1, 1);
//Output value in milliseconds
let endTime = endDate.getTime();
function countdown() {
  let todayDate = new Date();
  //Output value in milliseconds
  let todayTime = todayDate.getTime();
  let remainingTime = endTime - todayTime;
  //60sec => 1000 milliseconds
  let oneMin = 60 * 1000;
  //1hr => 60 minutes
  let oneHr = 60 * oneMin;
  //1 day => 24 hours
  let oneDay = 24 * oneHr;
  //Function to format number if it is single digit
  let addZeroes = (num) => (num < 10 ? `0${num}` : num);
  //If end dat is before today date
  if (endTime < todayTime) {
    clearInterval(i);
    document.querySelector(
      ".countdown"
    ).innerHTML = `<h1>Countdown had expired!</h1>`;
  }
  //If end date is not before today date
  else {
    //Calculating remaining days, hrs,mins ,secs
    let daysLeft = Math.floor(remainingTime / oneDay);
    let hrsLeft = Math.floor((remainingTime % oneDay) / oneHr);
    let minsLeft = Math.floor((remainingTime % oneHr) / oneMin);
    let secsLeft = Math.floor((remainingTime % oneMin) / 1000);
    //Displaying Valurs
    dayBox.textContent = addZeroes(daysLeft);
    hrBox.textContent = addZeroes(hrsLeft);
    minBox.textContent = addZeroes(minsLeft);
    secBox.textContent = addZeroes(secsLeft);
  }
}
let i = setInterval(countdown, 1000);
countdown();


gsap.to("nav", {
  backgroundColor: "#000", // Set the initial background color to black
  duration: 0.5,
  scrollTrigger: {
    trigger: "body",
    start: "top -10%",
    end: "top -11%",
    scrub: 1,
    onUpdate: ({ progress }) => {
      const backgroundColor = progress > 0 ? "#fff" : "#fff";
      gsap.set("nav", { backgroundColor });
    },
  },
});

gsap.to("#main", {
  backgroundColor: "#000",
  scrollTrigger: {
    trigger: "#main",
    scroller: "body",
    // markers: true,
    start: "top -25%",
    end: "top -70%",
    scrub: 2,
  },
});

gsap.from("#about-us img,#about-us-in", {
  y: 90,
  opacity: 0,
  duration: 1,
  scrollTrigger: {
    trigger: "#about-us",
    scroller: "body",
    // markers:true,
    start: "top 70%",
    end: "top 65%",
    scrub: 1,
  },
});
// gsap.from(".card", {
//   scale: 0.8,
//   // opacity:0,
//   duration: 1,
//   stagger: 0.1,
//   scrollTrigger: {
//     trigger: ".card",
//     scroller: "body",
//     // markers:false,
//     start: "top 70%",
//     end: "top 65%",
//     scrub: 1,
//   },
// });

// gsap.from("#page4 h1", {
//   y: 50,
//   scrollTrigger: {
//     trigger: "#page4 h1",
//     scroller: "body",
//     // markers:true,
//     start: "top 75%",
//     end: "top 70%",
//     scrub: 3,
//   },
// });

