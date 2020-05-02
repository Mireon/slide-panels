/**
 * ...
 */
class Panel {
    /**
     * ...
     *
     * @type string
     */
    private readonly id: string;

    /**
     * ...
     *
     * @type string
     */
    private readonly side: string;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.id = this.extractId(element);
        this.side = this.extractSide(element);
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public extractId(element: Element): string {
        const attribute = 'data-id';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const id = element.getAttribute(attribute);

        if (id === '') {
            return null;
        }

        return id;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public extractSide(element: Element): string {
        const attribute = 'data-side';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        switch (side) {
            case 'left':
            case 'right':
                return side;
        }

        return null;
    }

    /**
     * ...
     *
     * @param id { string }
     *  ...
     *
     * @return string
     */
    public isEqualId(id: string): boolean {
        return this.id === id;
    }

    /**
     * ...
     *
     * @return string
     */
    public getSide(): string {
        return this.side;
    }
}

export default Panel;
