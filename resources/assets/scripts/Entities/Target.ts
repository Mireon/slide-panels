import Selector from '@tools/Selector';

/**
 * ...
 */
class Target {
    /**
     * ...
     *
     * @type string
     */
    private readonly panel: string;

    /**
     * ...
     *
     * @type string
     */
    private readonly side: string;

    /**
     * ...
     *
     * @type Array<string>
     */
    private readonly layouts: Array<string>;

    /**
     * The constructor.
     *
     * @param hash { string }
     *   ...
     */
    public constructor(hash: string) {
        const elements = this.convertHashToArray(hash);
        this.panel = this.extractPanel(elements);
        this.layouts = this.extractLayouts(elements);
        this.side = this.extractSide();
    }

    /**
     * ...
     *
     * @param elements { Array<string> | null }
     *   ...
     *
     * @return string
     */
    private extractPanel(elements: Array<string> | null): string {
        return elements ? elements[0] : null;
    }

    /**
     * ...
     *
     * @return string
     */
    private extractSide(): string {
        const attribute = 'data-side';
        const element = Selector.element('panel').attribute('data-id', this.panel).get();

        if (element === null) {
            return null;
        }

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        if (side === 'left' || side === 'right') {
            return side;
        }

        return null;
    }

    /**
     * ...
     *
     * @param elements { Array<string> | null }
     *   ...
     *
     * @return Array<string>
     */
    private extractLayouts(elements: Array<string> | null): Array<string> {
        return elements ? elements.slice(1) : null;
    }

    /**
     * ...
     *
     * @param hash { string }
     *   ...
     *
     * @return Array<string>
     */
    private convertHashToArray(hash: string): Array<string> {
        if (hash === null || hash === '') {
            return null;
        }

        const result = hash.split('.')
            .map((item: string) => item.trim())
            .filter((item: string) => item !== '');

        if (result.length === 0) {
            return null;
        }

        return result;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public isValid(): boolean {
        return this.panel !== undefined;
    }

    /**
     * ...
     *
     * @type string
     */
    public getPanel(): string {
        return this.panel;
    }

    /**
     * ...
     *
     * @type string
     */
    public getSide(): string {
        return this.side;
    }
}

export default Target;
