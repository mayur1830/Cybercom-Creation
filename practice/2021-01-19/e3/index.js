var arr = [{
        name: 'mayur',
        age: 21,
        phone: 8128459608
    },
    {
        name: 'gaurang',
        age: 19,
        phone: 8128459602,
    },
    {
        name: 'vijay',
        age: 15,
        phone: 8128459605,
    }
]
arr.sort(function(a, b) {

    return a.age - b.age;
})
console.log(arr)