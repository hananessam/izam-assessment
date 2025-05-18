const Products = async () => {
    const response = await fetch('/api/products', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    });

    return response.json();
};

export default Products;
