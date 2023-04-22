function addItem(id, quantity)
{
    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML < quantity)
    {
        text.innerHTML++;
    }
}

function deleteItem(id)
{
    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML > 1)
    {
        text.innerHTML--;
    }
}