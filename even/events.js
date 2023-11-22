gsap.to("nav", {
    backgroundColor: "#000", // Set the initial background color to black
    duration: 0.5,
    scrollTrigger: {
      trigger: "body",
      start: "top -10%",
      end: "top -11%",
      scrub: 1,
      onUpdate: ({ progress }) => {
        const backgroundColor = progress > 0 ? "#000" : "transparent";
        gsap.set("nav", { backgroundColor });
      },
    },
  });