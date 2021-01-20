const info = {
    name: 'mayur',
    age: 21,
    email: 'abc@gmal.com',
    telephone: '8128459608',
}
for (const key in info) {
    if (Object.hasOwnProperty.call(info, key)) {
        const element = info[key];
        console.log(element)

    }
}