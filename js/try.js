let arr = [1, 1, 2, 3, 4, 5, 5, 5]

// let ids = ["accept45", "accept50", "reject70"];

let x = new Set(arr);
let y = [];
x.forEach(element => {
    y.push(element);
});
console.log(y);
// ids.forEach(
//     x => arr.push(x.slice(6, ))
// );
// console.log(arr.toString());

// z = arr.toString();
// console.log(`UPDATE event SET status = 'accept' WHERE id IN (${z});`);