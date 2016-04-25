function clickTable(link, id)
{
    if (id > 0) {
        document.location.href = 'http://' + window.location.hostname + link + id;
    }
}
