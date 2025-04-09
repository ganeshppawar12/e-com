<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Transfer List</h1>

<div style="display: flex">
    <div style="display: flex; flex-direction: column; gap: 10px; width: 30vw" id="leftSide"></div>

    <div style="display: flex; flex-direction: column; gap: 10px; width: 30vw">
        <button id="AllInRight" style="width: fit-content;"><<</button>
        <button id="selectLeft" style="width: fit-content;">&lt;</button>
        <button id="selectRight" style="width: fit-content;">&gt;</button>
        <button id="AllnLeft" style="width: fit-content;">&gt;&gt;</button>
    </div>

    <div id="rightSide" style="display: flex; flex-direction: column; gap: 10px; width: 30vw"></div>
</div>

<script>
    let arr1 = ['HTML', 'CSS', 'JS', 'TS'];
    let arr2 = ["REACT", 'NODE', 'Express', 'MongoDB'];

    const leftSide = document.getElementById('leftSide');
    const rightSide = document.getElementById('rightSide');
    const AllInRight = document.getElementById('AllInRight');
    const AllnLeft = document.getElementById('AllnLeft');
    const selectLeft = document.getElementById('selectLeft');
    const selectRight = document.getElementById('selectRight');

    function renderAllTheSection(a1, a2) {
        leftSide.innerHTML = "";
        rightSide.innerHTML = "";

        if (a1.length > 0) {
            a1.forEach((item) => {
                let div = document.createElement('div');
                div.innerHTML = `<div style="display: flex;">
                                    <input type="checkbox" class="leftCheck" value="${item}">
                                    <p>${item}</p>
                                </div>`;
                leftSide.append(div);
            });
        }

        if (a2.length > 0) {
            a2.forEach((item) => {
                let div = document.createElement('div');
                div.innerHTML = `<div style="display: flex;">
                                    <input type="checkbox" class="rightCheck" value="${item}">
                                    <p>${item}</p>
                                </div>`;
                rightSide.append(div);
            });
        }

        AllInRight.disabled = a2.length === 0;
        AllnLeft.disabled = a1.length === 0;
    }

    AllInRight.addEventListener('click', () => {
        arr1 = [...arr1, ...arr2];
        arr2 = [];
        renderAllTheSection(arr1, arr2);
    });

    AllnLeft.addEventListener('click', () => {
        arr2 = [...arr1, ...arr2];
        arr1 = [];
        renderAllTheSection(arr1, arr2);
    });

    renderAllTheSection(arr1, arr2);

    selectLeft.addEventListener('click', () => {
        let checkedValues = [];
        const rightCheck = document.querySelectorAll('.rightCheck'); 
        rightCheck.forEach(function (checkbox) {
            if (checkbox.checked) {
                checkedValues.push(checkbox.value);
                arr2 = arr2.filter(item => item !== checkbox.value);
            }
        });

        arr1 = [...arr1, ...checkedValues];
        renderAllTheSection(arr1, arr2);
    });

    selectRight.addEventListener('click', () => {
        let checkedValues = [];
        const leftCheck = document.querySelectorAll('.leftCheck');
        leftCheck.forEach(function (checkbox) {
            if (checkbox.checked) {
                checkedValues.push(checkbox.value);
                arr1 = arr1.filter(item => item !== checkbox.value);
            }
        });
        arr2 = [...arr2, ...checkedValues];
        renderAllTheSection(arr1, arr2);
    });
</script>

</body>
</html>
