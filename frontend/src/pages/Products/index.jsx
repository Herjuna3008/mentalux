import { useEffect, useState } from "react";

/**
 * Product listing page.
 * Displays a list of products retrieved from the backend API.
 */
const Products = () => {
  const [products, setProducts] = useState([]);
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const controller = new AbortController();

    const loadProducts = async () => {
      try {
        const response = await fetch("/api/products", {
          signal: controller.signal,
        });

        if (!response.ok) {
          throw new Error("Failed to fetch products");
        }

        const data = await response.json();
        setProducts(data);
      } catch (err) {
        if (err.name !== "AbortError") {
          setError(err.message || "Unknown error");
        }
      } finally {
        setLoading(false);
      }
    };

    loadProducts();

    return () => controller.abort();
  }, []);

  if (loading) {
    return <div>Loading products...</div>;
  }

  if (error) {
    return <div role="alert">{error}</div>;
  }

  if (!products.length) {
    return <div>No products available.</div>;
  }

  return (
    <div className="page products-page">
      <h1>Products</h1>
      <ul>
        {products.map((product) => (
          <li key={product.id}>
            <h2>{product.name}</h2>
            {product.description && <p>{product.description}</p>}
            {product.price != null && <p>{`$${product.price}`}</p>}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default Products;
