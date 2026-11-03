from pathlib import Path

import delta_sharing


def main():
    credentials_path = (
        Path(__file__).resolve().parent / "recipient_livebuzz_dev.share"
    )

    if not credentials_path.is_file():
        raise FileNotFoundError(
            f"Credentials file not found: {credentials_path}"
        )

    table_url = f"{credentials_path}#livebuzz_dev.fast_bi.products"
    products = delta_sharing.load_as_pandas(table_url, limit=20)

    print("\nColumns:")
    print(products.columns.tolist())

    print(f"\nProducts returned: {len(products)}")

    if products.empty:
        print("\nNo products found.")
    else:
        print("\nProducts:")
        print(products.to_string(index=False))


if __name__ == "__main__":
    main()