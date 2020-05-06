import Selector from '@tools/Selector';
import { C } from '@entities/C';

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
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type Array<string>
     */
    private readonly layers: Array<string>;

    /**
     * The constructor.
     *
     * @param hash { string }
     *   ...
     */
    public constructor(hash: string) {
        const elements = this.convertHashToArray(hash);
        this.panel = this.extractPanel(elements);
        this.layers = this.extractLayers(elements);
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
     * @return C.side
     */
    private extractSide(): C.side {
        const attribute = 'data-side';
        const element = Selector.element('panel').attribute('data-id', this.panel).get();

        if (element === null) {
            return null;
        }

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        if (side === C.side.LEFT || side === C.side.RIGHT) {
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
    private extractLayers(elements: Array<string> | null): Array<string> {
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
    public isExistsPanel(): boolean {
        return Selector.element('panel').attribute('data-id', this.panel).get() !== null;
    }

    /**
     * ...
     *
     * @type string
     */
    public getPanelId(): string {
        return this.panel;
    }

    /**
     * ...
     *
     * @type C.side
     */
    public getSide(): C.side {
        return this.side;
    }
}

export default Target;
